<?php

class Utils
{
    const CT_JSON = "application/json";
    const CT_SERIALIZED = "application/php-serialized";
    const CT_ENCODED = "application/php-encoded";
    const CT_COMPRESSED = "application/php-compressed";

    private static $db = null;

    public static function DB() {
        if(empty(self::$db)) {
            LogWriter::Log(__METHOD__, LL_INFO, "Connecting to database " . DB_NAME . " on " . DB_SERVER . ":" . DB_PORT);
            self::$db = new MysqliDb(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
            self::$db->connect();
            LogWriter::Log(__METHOD__, LL_INFO, "Connection established");
        }
        return self::$db;
    }

    public static function RequestArr(array $params)
    {
        $ret = array();
        foreach ($params as $p) {
            $ret[$p] = Utils::Request($p);
        }
        return $ret;
    }

    public static function Request($name, $default = null)
    {
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default;
    }

    public static function SessionGet($name, $default = null)
    {
        return isset($_SESSION[$name]) ? $_SESSION[$name] : $default;
    }

    public static function SessionSet($name, $val)
    {
        $_SESSION[$name] = $val;
    }

    public static function RequestSession($name, $session_var, $default)
    {
        $res = Utils::Request($name, Utils::SessionGet($session_var, $default));
        Utils::SessionSet($session_var, $res);
        return $res;
    }

    public static function GetArg($name, $default = null)
    {
        global $argv;
        if (isset($argv) && is_array($argv)) {
            $prev_arg = "";
            $_argv = $argv;
            $_argv[] = 1;
            foreach ($_argv as $arg) {
                if ($prev_arg == '-' . $name)
                    return $arg;
                $prev_arg = $arg;
            }
        }
        return $default;
    }

    public static function DefVal($val, $def)
    {
        return empty($val) ? $def : $val;
    }

    public static function FormatArray(&$array, $formatter)
    {
        foreach ($array as &$item)
            $item = $formatter($item);
    }

    public static function ArrayGetV($names, $array, $default = null, $check_empty = false, $delimeter = '.')
    {
        return self::ArrayGet($names, $array, $default, $check_empty, $delimeter);
    }

    public static function ArrayGet($names, &$array, $default = null, $check_empty = false, $delimeter = '.')
    {
        if (is_array($array)) {
            if (!is_array($names)) {
                $path = explode($delimeter, $names);
                $p = &$array;

                foreach ($path as $v) {
                    if (!isset($p[$v])) {
                        return $default;
                    }
                    $p = &$p[$v];
                }

                if ($check_empty)
                    if (!empty($p)) return $p;
                    else
                        return $p;
                return $p;
            } else {
                foreach ($names as $name) {
                    $res = null;
                    if (self::doArrayGet($name, $array, $res, $check_empty, $delimeter))
                        return $res;
                }
            }
        }
        return $default;
    }

    private static function doArrayGet($name, &$array, &$result, $check_empty, $delimeter)
    {
        $path = explode($delimeter, $name);
        $p = &$array;
        $sz = sizeof($path);
        $result = null;
        for ($i = 0; $i < $sz; $i++) {
            if (isset($p[$path[$i]])) {
                $p = &$p[$path[$i]];
                if ($i == $sz - 1) {
                    if ($check_empty) {
                        if (!empty($p)) {
                            $result = $p;
                            return true;
                        }
                    } else {
                        $result = $p;
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public static function DecodeDate($date)
    {
        if (intval($date) > 0 && date('Y', intval($date)) >= 2000) {
            return intval($date);
        } else {
            if ($d = date_parse($date)) {
                if ($d['error_count'] == 0 && $d['year'] > 0)
                    return mktime($d['hour'], $d['minute'], $d['second'], $d['month'], $d['day'], $d['year']);
            }
        }
        return null;
    }

    public static function ForceDirectories($dirName)
    {
        if (strlen($dirName) > 0 && !is_dir($dirName)) {
            $info = pathinfo($dirName);
            if (!is_dir($info["dirname"])) self::ForceDirectories($info["dirname"]);
            if (is_dir($info["dirname"])) {
                mkdir($dirName, 0777);
                chmod($dirName, 0777);
            }
        }
    }

    public static function HexToE32($hex, $Len = 0)
    {
        $arr = array(
            "00000" => "0", "00001" => "1", "00010" => "2", "00011" => "3", "00100" => "4", "00101" => "5",
            "00110" => "6", "00111" => "7", "01000" => "8", "01001" => "9", "01010" => "A", "01011" => "B",
            "01100" => "C", "01101" => "D", "01110" => "E", "01111" => "F", "10000" => "G", "10001" => "H",
            "10010" => "I", "10011" => "J", "10100" => "K", "10101" => "L", "10110" => "M", "10111" => "N",
            "11000" => "O", "11001" => "P", "11010" => "Q", "11011" => "R", "11100" => "S", "11101" => "T",
            "11110" => "U", "11111" => "V"
        );
        $count = ceil(strlen($hex) / 8);
        $hex = str_repeat("0", ($count * 8) - strlen($hex)) . $hex;
        $bin = "";
        $part = '00000000';
        for ($i = 0; $i < $count; $i++) {
            for ($z = 0; $z < 8; $z++)
                $part[$z] = $hex[$i * 8 + $z];
            $bin = $bin . sprintf("%032s", decbin(hexdec($part)));
        }
        $count = ceil(strlen($bin) / 5);
        $bin = str_repeat("0", ($count * 5) - strlen($bin)) . $bin;
        $e32 = "";
        $part = '00000';
        for ($i = 0; $i < $count; $i++) {
            for ($z = 0; $z < 5; $z++)
                $part[$z] = $bin[$i * 5 + $z];
            $char = $arr[$part];
            if ($e32 <> '' || $char <> '0')
                $e32 = $e32 . $char;
        }
        if (strlen($e32) < $Len) $e32 = str_repeat("0", $Len - strlen($e32)) . $e32;
        return $e32;
    }

    public static function E32ToHex($e32, $Len = 0)
    {
        $arr = array(
            "0" => "00000", "1" => "00001", "2" => "00010", "3" => "00011", "4" => "00100", "5" => "00101",
            "6" => "00110", "7" => "00111", "8" => "01000", "9" => "01001", "A" => "01010", "B" => "01011",
            "C" => "01100", "D" => "01101", "E" => "01110", "F" => "01111", "G" => "10000", "H" => "10001",
            "I" => "10010", "J" => "10011", "K" => "10100", "L" => "10101", "M" => "10110", "N" => "10111",
            "O" => "11000", "P" => "11001", "Q" => "11010", "R" => "11011", "S" => "11100", "T" => "11101",
            "U" => "11110", "V" => "11111"
        );
        $arr1 = array(
            "0000" => "0", "0001" => "1", "0010" => "2", "0011" => "3", "0100" => "4", "0101" => "5",
            "0110" => "6", "0111" => "7", "1000" => "8", "1001" => "9", "1010" => "A", "1011" => "B",
            "1100" => "C", "1101" => "D", "1110" => "E", "1111" => "F"
        );
        $bin = "";
        $e32 = strtoupper($e32);
        $count = strlen($e32);
        for ($i = 0; $i < $count; $i++) {
            if (array_key_exists($e32[$i], $arr))
                $bin = $bin . $arr[$e32[$i]];
            else
                $bin = $bin . '0';
        }
        $count = ceil(strlen($bin) / 4);
        $bin = str_repeat("0", ($count * 4) - strlen($bin)) . $bin;
        $hex = "";
        for ($i = 0; $i < $count; $i++) {
            $part = substr($bin, $i * 4, 4);
            $char = $arr1[$part];
            if ($hex <> '' || $char <> '0')
                $hex = $hex . $char;
        }
        if (strlen($hex) < $Len) $hex = str_repeat("0", $Len - strlen($hex)) . $hex;
        return $hex;
    }

    public static function CreateGUID($namespace = '', $format = true)
    {
        $uid = uniqid("", true);
        $data = $namespace . getmypid();
        if (array_key_exists('REQUEST_TIME', $_SERVER)) $data .= $_SERVER['REQUEST_TIME'];
        if (array_key_exists('HTTP_USER_AGENT', $_SERVER)) $data .= $_SERVER['HTTP_USER_AGENT'];
        if (array_key_exists('LOCAL_ADDR', $_SERVER)) $data .= $_SERVER['LOCAL_ADDR'];
        if (array_key_exists('LOCAL_PORT', $_SERVER)) $data .= $_SERVER['LOCAL_PORT'];
        if (array_key_exists('REMOTE_ADDR', $_SERVER)) $data .= $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('REMOTE_PORT', $_SERVER)) $data .= $_SERVER['REMOTE_PORT'];
        if (array_key_exists('HOSTNAME', $_SERVER)) $data .= $_SERVER['HOSTNAME'];
        $hash = strtoupper(hash('ripemd128', $uid . md5($data)));
        if ($format) {
            return '{' .
                substr($hash, 0, 8) .
                '-' .
                substr($hash, 8, 4) .
                '-' .
                substr($hash, 12, 4) .
                '-' .
                substr($hash, 16, 4) .
                '-' .
                substr($hash, 20, 12) .
                '}';
        } else {
            return $hash;
        }
    }

    public static function num2hash($num)
    {
        $hash = md5($num);
        $hex = sprintf('%08x', $num);
        for ($i = 0; $i < 8; $i++) {
            $hash[1 + $i * 3] = $hex[7 - $i];
        }
        $hash[29] = $hex[6];
        $hash[31] = $hex[7];
        return $hash;
    }

    public static function hash2num($hash)
    {
        $hex = "00000000";
        for ($i = 0; $i < 8; $i++) {
            $hex[7 - $i] = $hash[1 + $i * 3];
        }
        if ($hash[29] == $hex[6] && $hash[31] == $hex[7])
            return hexdec($hex);
        else
            return 0;
    }


    public static function ReadIni($data)
    {
        $res = array();
        $lines = explode("\n", str_replace("\r", "", $data));
        $curr_section = 0;
        for ($i = 0; $i < sizeof($lines); $i++) {
            if (preg_match("/(.*?)=(.*?)\t/i", trim($lines[$i]) . "\t", $matches)) {
                if (!array_key_exists($curr_section, $res))
                    $res[$curr_section] = array();
                $res[$curr_section][$matches[1]] = $matches[2];
            } elseif (preg_match("/\[(.*?)\]\t/i", trim($lines[$i]) . "\t", $matches)) {
                $curr_section = $matches[1];
            }
        }
        return $res;
    }

    public static function ReadIniFile($path)
    {
        return self::ReadIni(file_get_contents($path));
    }

    public static function WriteIni($data)
    {
        $res = "";
        foreach ($data as $section => $items) {
            $res .= '[' . $section . ']' . PHP_EOL;
            foreach ($items as $name => $value) {
                $res .= $name . '=' . $value . PHP_EOL;
            }
        }
        return $res;
    }

    public static function DecodeData($content_type, $data, $arr = false)
    {
        if (is_null($content_type)) {
            switch ($data[0]) {
                case 'J':
                    return self::DecodeData(self::CT_JSON, substr($data, 1), $arr);
                case 'S':
                    return self::DecodeData(self::CT_SERIALIZED, substr($data, 1), $arr);
                case 'E':
                    return self::DecodeData(self::CT_ENCODED, substr($data, 1), $arr);
                case 'Z':
                    return self::DecodeData(self::CT_COMPRESSED, substr($data, 1), $arr);
            }
        }

        switch ($content_type) {
            case self::CT_JSON:
                return @json_decode($data, $arr);
            case self::CT_SERIALIZED:
                return @unserialize($data);
            case self::CT_ENCODED:
                return @unserialize(base64_decode($data));
            case self::CT_COMPRESSED:
                return unserialize(gzuncompress(base64_decode($data)));
            default:
                return null;
        }
    }

    public static function EncodeData($content_type, $data, $add_enctype = false)
    {
        switch ($content_type) {
            case self::CT_JSON:
                return ($add_enctype ? 'J' : '') . json_encode($data);
            case self::CT_SERIALIZED:
                return ($add_enctype ? 'S' : '') . serialize($data);
            case self::CT_ENCODED:
                return ($add_enctype ? 'E' : '') . base64_encode(serialize($data));
            case self::CT_COMPRESSED:
                return ($add_enctype ? 'Z' : '') . base64_encode(gzcompress(serialize($data)));
            default:
                return null;
        }
    }

    public static function StrToE32($str)
    {
        $hex = '';
        for ($i = 0; $i < strlen($str); $i++)
            $hex .= sprintf('%02x', ord($str[$i]));
        return self::HexToE32($hex);
    }

    public static function E32ToStr($data)
    {
        $hex = self::E32ToHex($data);
        $str = '';
        for ($i = 0; $i < strlen($hex); $i = $i + 2)
            $str .= chr(hexdec(substr($hex, $i, 2)));
        return $str;
    }

    public static function HexToE64($hex, $Len = 0)
    {
        $arr = array(
            "000000" => "0", "000001" => "1", "000010" => "2", "000011" => "3", "000100" => "4", "000101" => "5",
            "000110" => "6", "000111" => "7", "001000" => "8", "001001" => "9", "001010" => "A", "001011" => "B",
            "001100" => "C", "001101" => "D", "001110" => "E", "001111" => "F", "010000" => "G", "010001" => "H",
            "010010" => "I", "010011" => "J", "010100" => "K", "010101" => "L", "010110" => "M", "010111" => "N",
            "011000" => "O", "011001" => "P", "011010" => "Q", "011011" => "R", "011100" => "S", "011101" => "T",
            "011110" => "U", "011111" => "V",
            "100000" => "W", "100001" => "X", "100010" => "Y", "100011" => "Z", "100100" => "a", "100101" => "b",
            "100110" => "c", "100111" => "d", "101000" => "e", "101001" => "f", "101010" => "g", "101011" => "h",
            "101100" => "i", "101101" => "j", "101110" => "k", "101111" => "l", "110000" => "m", "110001" => "n",
            "110010" => "o", "110011" => "p", "110100" => "q", "110101" => "r", "110110" => "s", "110111" => "t",
            "111000" => "u", "111001" => "v", "111010" => "w", "111011" => "x", "111100" => "y", "111101" => "z",
            "111110" => "@", "111111" => "_"
        );
        $count = ceil(strlen($hex) / 8);
        $hex = str_repeat("0", ($count * 8) - strlen($hex)) . $hex;
        $bin = "";
        $part = '00000000';
        for ($i = 0; $i < $count; $i++) {
            for ($z = 0; $z < 8; $z++) $part[$z] = $hex[$i * 8 + $z];
            //$part = substr($hex, $i * 8, 8);
            $bin = $bin . sprintf("%032s", decbin(hexdec($part)));
        }
        $count = ceil(strlen($bin) / 6);
        $bin = str_repeat("0", ($count * 6) - strlen($bin)) . $bin;
        $e64 = "";
        $part = '000000';
        for ($i = 0; $i < $count; $i++) {
            for ($z = 0; $z < 6; $z++) $part[$z] = $bin[$i * 6 + $z];
            //$part = substr($bin, $i * 5, 5);
            $char = $arr[$part];
            if ($e64 <> '' || $char <> '0')
                $e64 = $e64 . $char;
        }
        if (strlen($e64) < $Len) $e64 = str_repeat("0", $Len - strlen($e64)) . $e64;
        return $e64;
    }

    public static function E64ToHex($e64, $Len = 0)
    {
        $arr = array(
            "0" => "000000", "1" => "000001", "2" => "000010", "3" => "000011",
            "4" => "000100", "5" => "000101", "6" => "000110", "7" => "000111",
            "8" => "001000", "9" => "001001", "A" => "001010", "B" => "001011",
            "C" => "001100", "D" => "001101", "E" => "001110", "F" => "001111",
            "G" => "010000", "H" => "010001", "I" => "010010", "J" => "010011",
            "K" => "010100", "L" => "010101", "M" => "010110", "N" => "010111",
            "O" => "011000", "P" => "011001", "Q" => "011010", "R" => "011011",
            "S" => "011100", "T" => "011101", "U" => "011110", "V" => "011111",
            "W" => "100000", "X" => "100001", "Y" => "100010", "Z" => "100011",
            "a" => "100100", "b" => "100101", "c" => "100110", "d" => "100111",
            "e" => "101000", "f" => "101001", "g" => "101010", "h" => "101011",
            "i" => "101100", "j" => "101101", "k" => "101110", "l" => "101111",
            "m" => "110000", "n" => "110001", "o" => "110010", "p" => "110011",
            "q" => "110100", "r" => "110101", "s" => "110110", "t" => "110111",
            "u" => "111000", "v" => "111001", "w" => "111010", "x" => "111011",
            "y" => "111100", "z" => "111101", "@" => "111110", "_" => "111111",
        );
        $arr1 = array(
            "0000" => "0", "0001" => "1", "0010" => "2", "0011" => "3", "0100" => "4", "0101" => "5",
            "0110" => "6", "0111" => "7", "1000" => "8", "1001" => "9", "1010" => "A", "1011" => "B",
            "1100" => "C", "1101" => "D", "1110" => "E", "1111" => "F"
        );
        $bin = "";
        $count = strlen($e64);
        for ($i = 0; $i < $count; $i++) {
            if (isset($arr[$e64[$i]]))
                $bin = $bin . $arr[$e64[$i]];
            else
                $bin = $bin . '0';
        }
        $count = ceil(strlen($bin) / 4);
        $bin = str_repeat("0", ($count * 4) - strlen($bin)) . $bin;
        $hex = "";
        for ($i = 0; $i < $count; $i++) {
            $part = substr($bin, $i * 4, 4);
            $char = $arr1[$part];
            if ($hex <> '' || $char <> '0')
                $hex = $hex . $char;
        }
        if (strlen($hex) < $Len) $hex = str_repeat("0", $Len - strlen($hex)) . $hex;
        return strtolower($hex);
    }

    public static function StrToE64($str)
    {
        $hex = '';
        for ($i = 0; $i < strlen($str); $i++)
            $hex .= sprintf('%02x', ord($str[$i]));
        return self::HexToE64($hex);
    }

    public static function E64ToStr($data)
    {
        $hex = self::E64ToHex($data);
        $str = '';
        for ($i = 0; $i < strlen($hex); $i = $i + 2)
            $str .= chr(hexdec(substr($hex, $i, 2)));
        return $str;
    }

    public static function ArrayWalk($arr, $procs)
    {
        $ret = array();
        foreach ($arr as $n => $v) {
            foreach ($procs as $f => $p) {
                if (is_array($p)) {
                    $force = isset($p['force']) ? $p['force'] : false;
                    $field = isset($p['field']) ? $p['field'] : $f;
                    $p = $p['proc'];
                } else {
                    $force = false;
                    $field = $f;
                }
                if (is_callable($p) && (array_key_exists($field, $v) || $force))
                    $v[$f] = $p($v[$field], $v);
            }
            $ret[$n] = $v;
        }
        return $ret;
    }

    static public function Between($value, $range, $cmpFunc = NULL)
    {
        if (!is_scalar($value) && !is_callable($cmpFunc))
            return NULL;

        if (self::ArrayGet(0, $range) == 0 || self::ArrayGet(1, $range) == 0)
            return NULL;

        if (is_callable($cmpFunc))
            if ($cmpFunc($value, $range[0]) >= 0 && $cmpFunc($value, $range[1]) <= 0)
                return TRUE;
            else
                return FALSE;

        if ($range[0] >= $value && $range[1] <= $value)
            return TRUE;
        else
            return FALSE;

    }

    static public function CreateBitMask()
    {
        $mask = 0;
        for ($i = 0; $i < func_num_args(); $i++) {
            $mask |= 1 << (int)func_get_arg($i);
        }
        return $mask;
    }

    static public function CheckBitMask($mask, $val)
    {
        return (bool)($mask & 1 << $val);
    }

    public static function CreateShortName($full_name)
    {
        $pp = explode(' ', $full_name);
        if (sizeof($pp) >= 3) {
            $r = $pp[0] . " " . mb_substr($pp[1], 0, 1) . "." . mb_substr($pp[2], 0, 1) . ".";
            unset($pp[0]);
            unset($pp[1]);
            unset($pp[2]);
            return trim($r . " " . implode(" ", $pp));
        } else {
            return $full_name;
        }
    }

    public static function GetFIO($name)
    {
        if ($name != 'Kvantorium Assistant') {
            $name = explode(" ", $name);
            return str_replace("..", ".", $name[0] . " " . mb_substr($name[1], 0, 1, 'utf-8') . "." . mb_substr($name[2], 0, 1, 'utf-8') . ".");
        } else {
            return $name;
        }
    }

    public static function ParsePhone($phone)
    {
        $phone = str_replace(array('+', '-', '(', ')', ' '), array('', '', '', '', ''), $phone);
        if (strlen($phone) == 10)
            $phone = '8' . $phone;
        if (strlen($phone) > 0 && $phone[0] == 7)
            $phone[0] = 8;
        if (strlen($phone) == 11)
            return $phone;
        else
            return null;
    }

    public static function ParseDate($date_str)
    {
        $b = explode('/', $date_str);
        if (sizeof($b) == 3) {
            return mktime(0, 0, 0, $b[1], $b[0], $b[2]);
        } else {
            return strtotime($date_str);
        }
    }

    public static function rmdir_recursive($dir)
    {
        foreach (scandir($dir) as $file) {
            if ('.' === $file || '..' === $file) continue;
            if (is_dir("$dir/$file")) self::rmdir_recursive("$dir/$file");
            else unlink("$dir/$file");
        }
        rmdir($dir);
    }

    public static function MakeArrayIndexed(array $arr, $index_field, $value_field = null)
    {
        $ret = array();
        foreach ($arr as $item) {
            if ($value_field)
                $ret[$item[$index_field]] = $item[$value_field];
            else
                $ret[$item[$index_field]] = $item;
        }
        return $ret;
    }

    public static function TimeIntervalToString($tms, $default = "")
    {
        $days = intval($tms / DT_DAY);
        $hours = intval(($tms - $days * DT_DAY) / DT_HOUR);
        $mins = intval(($tms - $days * DT_DAY - $hours * DT_HOUR) / DT_MIN);
        $secs = intval($tms - $days * DT_DAY - $hours * DT_HOUR - $mins * DT_MIN);
        $res = ""
            . ($days > 0 ? $days . " д. " : "")
            . ($hours > 0 ? $hours . " ч. " : "")
            . ($days == 0 && $mins > 0 ? $mins . " мин. " : "")
            . ($secs > 0 && $hours == 0 && $days == 0 ? $secs . " сек. " : "");
        if (empty($res))
            $res = $default;
        return $res;
    }

    public static function TimeSecondsToString($tms)
    {
        $hours = intval($tms / DT_HOUR);
        $mins = intval(($tms - $hours * DT_HOUR) / DT_MIN);
        $secs = intval($tms - $hours * DT_HOUR - $mins * DT_MIN);
        $res = ""
            . ($hours > 0 ? $hours . ":" : "")
            . sprintf("%02d:%02d", $mins, $secs);
        return $res;
    }

    public static function GetMicrotime($sync = false)
    {
        $t = microtime();
        $t = explode(' ', $t);
        $ret = (float)$t[1] + (float)$t[0];
        return $ret;
    }

    public static function IsValidUUID($uuid) {
        if (!is_string($uuid) || (preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $uuid) !== 1)) {
            return false;
        } else {
            return true;
        }
    }

    public static function CreateUUID()
    {
        $uuid = array(
            'time_low'  => 0,
            'time_mid'  => 0,
            'time_hi'  => 0,
            'clock_seq_hi' => 0,
            'clock_seq_low' => 0,
            'node'   => array()
        );

        $uuid['time_low'] = mt_rand(0, 0xffff) + (mt_rand(0, 0xffff) << 16);
        $uuid['time_mid'] = mt_rand(0, 0xffff);
        $uuid['time_hi'] = (4 << 12) | (mt_rand(0, 0x1000));
        $uuid['clock_seq_hi'] = (1 << 7) | (mt_rand(0, 128));
        $uuid['clock_seq_low'] = mt_rand(0, 255);

        for ($i = 0; $i < 6; $i++) {
            $uuid['node'][$i] = mt_rand(0, 255);
        }

        $uuid = sprintf('%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x',
            $uuid['time_low'],
            $uuid['time_mid'],
            $uuid['time_hi'],
            $uuid['clock_seq_hi'],
            $uuid['clock_seq_low'],
            $uuid['node'][0],
            $uuid['node'][1],
            $uuid['node'][2],
            $uuid['node'][3],
            $uuid['node'][4],
            $uuid['node'][5]
        );

        return $uuid;
    }

    public static function ExtractArrayField(&$items, $field, $uniq = false)
    {
        $res = array();
        foreach($items as $item) {
            if(is_array($item) && isset($item[$field])) {
                $val = $item[$field];
                if($uniq && in_array($val, $res))
                    continue;
                $res[] = $val;
            }
        }
        return $res;
    }

    public static function humanFileSize($size, $unit="") {
        if( (!$unit && $size >= 1<<30) || $unit == "GB")
            return number_format($size/(1<<30),2)."GB";
        if( (!$unit && $size >= 1<<20) || $unit == "MB")
            return number_format($size/(1<<20),2)."MB";
        if( (!$unit && $size >= 1<<10) || $unit == "KB")
            return number_format($size/(1<<10),2)."KB";
        return number_format($size)."B";
    }

    public static function Transliterate($str)
    {
        $cyr = array(
            'ж',  'ч',  'щ',   'ш',  'ю',  'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ъ', 'ь', 'я', 'ы',
            'Ж',  'Ч',  'Щ',   'Ш',  'Ю',  'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ъ', 'Ь', 'Я', 'Ы');
        $lat = array(
            'zh', 'ch', 'sht', 'sh', 'yu', 'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'y', 'x', 'ya', 'y',
            'Zh', 'Ch', 'Sht', 'Sh', 'Yu', 'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Y', 'X', 'Ya', 'Y');
        $str = str_replace($cyr, $lat, $str);
        for($i = 0; $i < strlen($str); $i++)
        {
            if(!in_array($str[$i], $lat))
                $str[$i] = '_';
        }
        return $str;
    }
}

