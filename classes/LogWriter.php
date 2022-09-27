<?php
/**
 * Класс для ведения протокола работы системы
 *
 * @encoding UTF-8
 * @author   V.Ponomarev <sbnnlab@gmail.com>
 */

define("LL_TRACE",   0);
define("LL_DEBUG",   1);
define("LL_INFO",    2);
define("LL_WARN",  100);
define("LL_ERROR", 101);
define("LL_FATAL", 102);

class LogWriter
{
    private static $logWriter = null;

    public static function Init($writer) {
        if($writer == "echo")
            self::$logWriter = new EchoLogWriter();
        else if($writer == "file") {
            self::$logWriter = new FileLogWriter();
        }
    }

    public static function Log($sender, $kind, $string = null)
    {
        if (is_object(self::$logWriter)) {
            if (is_object($sender)) {
                $sender = get_class($sender);
            }
            if (!is_int($kind) && empty($string)) {
                $string = $kind;
                $kind = LL_TRACE;
            }
            if(!is_scalar($string))
                $string = print_r($string, true);
            if(!is_int($kind)) {
                $kind = LL_ERROR;
            }
            self::$logWriter->Write($sender, $kind, $string);
        }
    }
}

class EchoLogWriter
{
    public function __construct() {
    }

    public function Write($source, $kind, $string)
    {
        switch ($kind) {
            case LL_TRACE:
                $s_kind = "TRACE";
                $fc = 37; /*white*/
                break;
            case LL_DEBUG:
                $s_kind = "DEBUG";
                $fc = 32; /*green*/
                break;
            case LL_INFO:
                $s_kind = "INFO";
                $fc = 36; /*light blue*/
                break;
            case LL_WARN:
                $s_kind = "WARN";
                $fc = 33; /*yellow*/
                break;
            case LL_ERROR:
                $s_kind = "ERROR";
                $fc = 31; /*red*/
                break;
            case LL_FATAL:
                $s_kind = "FATAL";
                $fc = 35; /*purple*/
                break;
            default:
                $s_kind = "UNKN";
                $fc = 34; /*blue*/
                break;
        }
        echo sprintf("\x1b[%dm[%s] [%d] [%.4f] [%d] [%s] %s: %s\x1b[0m\n", $fc, date('Y-m-d H:i:s'), getmypid(), Utils::GetMicrotime() - SCRIPT_START_TIME, memory_get_usage(), $s_kind, $source, $string);
    }
}

class FileLogWriter
{
    protected $lineAdded = false;
    public $fileName = null;

    public function __construct() {
        $this->fileName = ROOT_PATH . '/logs/' . date('Y-m-d') . '.log';
    }

    public static function Create($suffix) {
        $ret = new FileLogWriter();
        $ret->fileName = ROOT_PATH . '/logs/' . date('Y-m-d') .'.' . $suffix .'.log';
        return $ret;
    }

    public function Write($source, $kind, $string)
    {
        if (!$this->lineAdded) {
            file_put_contents($this->fileName, "\n", FILE_APPEND);
            $this->lineAdded = true;
        }
        switch ($kind) {
            case LL_TRACE:
                $s_kind = "TRACE";
                break;
            case LL_DEBUG:
                $s_kind = "DEBUG";
                break;
            case LL_INFO:
                $s_kind = "INFO";
                break;
            case LL_WARN:
                $s_kind = "WARN";
                break;
            case LL_ERROR:
                $s_kind = "ERROR";
                break;
            case LL_FATAL:
                $s_kind = "FATAL";
                break;
            default:
                $s_kind = "UNKN";
                break;
        }
        file_put_contents($this->fileName, sprintf('[%s] [%d] [%.4f] [%d] [%s] %s: %s' . "\n", date('Y-m-d H:i:s'), getmypid(), Utils::GetMicrotime() - SCRIPT_START_TIME, memory_get_usage(), $s_kind, is_object($source) ? get_class($source) : $source, $string), FILE_APPEND);
    }
}
