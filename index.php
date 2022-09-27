<?php
include __DIR__ . '/core.php';

session_name(SYS_COOKIE_AUTH);
session_start();

try{
    $view = isset($_REQUEST['view']) ? $_REQUEST['view'] : 'index';
    LogWriter::Log("index", LL_INFO, "Execute view " . $view);
    Facade::Run($view, $_REQUEST, ROOT_PATH, ROOT_URL);
    LogWriter::Log("index", LL_INFO, "Done " . $view);
} catch (Exception $e) {
    Facade::Run("error", $e, ROOT_PATH, ROOT_URL);
}
