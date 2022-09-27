<?php
define("ROOT_URL", isset($_SERVER['REQUEST_SCHEME']) && isset($_SERVER['HTTP_HOST']) ? $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] : "");
define("SYS_HOST", isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : "");
define("PRODUCTION", false);

// Cookie defines
define("SYS_COOKIE", "lnm-");
define("SYS_COOKIE_ACCEPT", SYS_COOKIE."accept");
define("SYS_COOKIE_DTE", SYS_COOKIE."dte");
define("SYS_COOKIE_AUTH", SYS_COOKIE."auth");

// Date interval consts
define('DT_SEC', 1);
define('DT_MIN', 60 * DT_SEC);
define('DT_HOUR', 60 * DT_MIN);
define('DT_DAY', 24 * DT_HOUR);
define('DT_WEEK', 7 * DT_DAY);

if(!file_exists(__DIR__."/config.local.php")) {
    copy(__DIR__."/config.php", __DIR__."/config.local.php");
}
require_once __DIR__."/config.local.php";