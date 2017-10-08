<?php

namespace mpcmf;

use mpcmf\system\cache\cache;
use mpcmf\system\io\log;

!defined('APP_ROOT') && define('APP_ROOT', __DIR__);
!defined('APP_NAME') && define('APP_NAME', 'mpcmf');
!defined('MPCMF_CACHE') && define('MPCMF_CACHE', '/tmp/' . basename(__DIR__));

$GLOBALS['MPCMF_START_TIME'] = microtime(true);

require_once APP_ROOT . '/vendor/autoload.php';
require_once APP_ROOT . '/environment.php';

if(!class_exists(cacheHack::class)) {
    class cacheHack
        extends cache
    {

        public static function fix()
        {
            self::$cacheBasePath = MPCMF_CACHE;
        }
    }
}
cacheHack::fix();

MPCMF_DEBUG && log::factory()->addDebug('Base project directory: ' . APP_ROOT);
