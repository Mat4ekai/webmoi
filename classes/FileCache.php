<?php

/**
 * Класс для доступа к файлову кэшу
 *
 * @encoding UTF-8
 * @author   V.Ponomarev <sbnnlab@gmail.com>
 */
class FileCache
{
    private static $_enabled = false;
    private static $_path = null;

    /**
     * @desc Set root path for cache files
     */
    public static function SetPath($path)
    {
        self::$_path = $path;
    }

    /**
     * @desc Enable file cache
     */
    public static function Enable()
    {
        self::$_enabled = true;
    }

    /**
     * @desc Disable file cache
     */
    public static function Disable()
    {
        self::$_enabled = false;
    }

    public static function getFileName($name)
    {
        $md5 = Utils::HexToE32(md5($name), 26);
        $dir = rtrim(self::$_path, "/") . "/" . substr($md5, 0, 2) . '/';
        $fname = $dir . substr($md5, 2) . '.cache';
        return array($dir, $fname);
    }

    public static function internalStat($action, $fc_path, $ttl = null)
    {
        $inf = pathinfo($fc_path);
        file_put_contents($inf['dirname'] . '/dir.log', $action . "\t" . $inf['basename'] . "\t" . time() . "\t" . $ttl . "\n", FILE_APPEND);
    }

    /**
     * @desc Retrieve item from the cache
     *
     * Returns the string associated with the key or FALSE on failure or if such key was not found.
     * Deprecated params $ttl,$touch
     *
     * @param string $name
     * @return mixed
     */
    public static function Get($name, $ttl = DT_DAY)
    {
        if (!self::$_enabled)
            return false;

        list($dir, $fname) = self::getFileName($name);

        if (file_exists($fname)) {
            $serialized = false;
        } elseif (file_exists($fname . '.serialized')) {
            $fname = $fname . '.serialized';
            $serialized = true;
        } else {
            return false;
        }
        if ($ttl > 0 && time() - filemtime($fname) > $ttl) {
            self::Delete($name);
            return false;
        }
        if ($serialized) {
            try {
                $result = @unserialize(file_get_contents($fname));
                return $result;
            } catch (Exception $e) {
                return false;
            }
        } else {
            return file_get_contents($fname);
        }
    }

    public static function GetCb($name, $ttl = DT_DAY, $cb, $args = null)
    {
        $ret = self::Get($name, $ttl);
        if(empty($ret)) {
            if(is_array($args))
                $ret = call_user_func_array($cb, $args);
            else
                $ret = call_user_func($cb);
            self::Set($name, $ret);
        }
        return $ret;
    }

        /**
     * @desc Retrieve item from the cache
     *
     * Returns the string associated with the key or FALSE on failure or if such key was not found.
     * Deprecated params $ttl,$touch
     *
     * @param string $name
     * @return mixed
     */
    public static function GetFP($name, $nocheck = false)
    {
        if (!self::$_enabled)
            return false;

        list($dir, $fname) = self::getFileName($name);
        if ($nocheck)
            return $fname;

        if (file_exists($fname)) {
            //
        } elseif (file_exists($fname . '.serialized')) {
            $fname = $fname . '.serialized';
            //
        } else {
            return false;
        }
        return $fname;
    }

    /**
     * @desc Store data at the cache
     *
     * Returns TRUE on success or FALSE on failure.
     *
     * @param string $name The key that will be associated with the item.
     * @param mixed $data The variable to store. Strings and integers are stored as is, other types are stored serialized.
     * @return boolean
     */
    public static function Set($name, $data, $serialize = true)
    {
        if (!self::$_enabled)
            return false;
        list($dir, $fname) = self::getFileName($name);
        Utils::ForceDirectories($dir);
        if ($serialize) {
            file_put_contents($fname . '.serialized', serialize($data));
            chmod($fname . '.serialized', 0777);
        } else {
            file_put_contents($fname, $data);
            chmod($fname, 0777);
        }
        return true;
    }

    /**
     * @desc Delete item from the server
     *
     * MC::Delete() deletes item with the key. If parameter timeout is specified,
     * the item will expire after timeout seconds.
     *
     * @param string $key
     * @param integer $timeout
     */
    public static function Delete($name)
    {
        if (!self::$_enabled)
            return false;
        list($dir, $fname) = self::getFileName($name);
        if (file_exists($fname)) {
            unlink($fname);
        }
        $fname = $fname . '.serialized';
        if (file_exists($fname)) {
            unlink($fname);
        }
    }
}
