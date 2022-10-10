<?php
define("ROOT_PATH", __DIR__);

require_once(ROOT_PATH . "/const.php");

spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    $path = ROOT_PATH . "/classes/" . $class_name . ".php";
    if (file_exists($path)) {
        require_once $path;
    } else {
        if(PRODUCTION)
            http_response_code(502);
        else
            die("File not found ".$path.PHP_EOL);
    }
});

$ErrorLog = null;

function gErrorHandler($errno, $errstr, $errfile, $errline)
{
    switch ($errno) {
        case E_ERROR:
            $type = 'Fatal error';
            $ctr = "fatal";
            break;
        case E_WARNING:
            $type = 'Warning';
            $ctr = "warning";
            break;
        case E_PARSE:
            $type = 'Parse error';
            $ctr = "parse";
            break;
        case E_NOTICE:
            $type = 'Notice';
            $ctr = "notice";
            break;
        case E_STRICT:
            $type = 'Strict notice';
            $ctr = "strict";
            break;
        case E_CORE_ERROR:
            $type = 'Core error';
            $ctr = "core";
            break;
        case E_CORE_WARNING:
            $type = 'Core warning';
            $ctr = "core";
            break;
        case E_COMPILE_ERROR:
            $type = 'Compile error';
            $ctr = "compile";
            break;
        case E_COMPILE_WARNING:
            $type = 'Compile warning';
            $ctr = "compile";
            break;
        case E_USER_ERROR:
            $type = 'User error';
            $ctr = "user_error";
            break;
        case E_USER_WARNING:
            $type = 'User warning';
            $ctr = "user_warning";
            break;
        case E_USER_NOTICE:
            $type = 'User notice';
            $ctr = "user_notice";
            break;
        case 8192:
            $type = 'Deprecated';
            $ctr = "deprecated";
            break;
        default:
            $type = strval($errno);
            $ctr = "unknown";
            break;
    }

    $errfile = str_replace(ROOT_PATH, '', $errfile);
    $errfile = str_replace('\\', '/', $errfile);
    $text = sprintf('%s: %s in %s on line %d.', $type, $errstr, $errfile, $errline);
    $e = new Exception($text);
    global $ErrorLog;
    if(empty($ErrorLog)) {
        $ErrorLog = FileLogWriter::Create('error');
    }
    $ErrorLog->Write('ErrorHandler', LL_ERROR, $e);
    \LogWriter::Log('ErrorHandler', LL_ERROR, $e);
    if (in_array($errno, array(E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR, 8192)))
        throw $e;
}

function gErrorHandler_shutdown()
{
    $last_error = error_get_last();
    if (!empty($last_error) && $last_error['type'] === E_ERROR) {
        gErrorHandler($last_error['type'], $last_error['message'], $last_error['file'], $last_error['line']);
    }
    LogWriter::Log(__METHOD__, 'Done');
}

set_error_handler("gErrorHandler");
register_shutdown_function('gErrorHandler_shutdown');

define("SCRIPT_START_TIME", Utils::GetMicrotime());

$log = Utils::Request("log");
if (empty($log))
    $log = Utils::GetArg("log");
if (!empty($log))
    LogWriter::Init($log);

LogWriter::Log("CORE", LL_INFO, "Begin");
FileCache::SetPath(ROOT_PATH."/cache/data");
FileCache::Enable();

