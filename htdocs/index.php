<?php

namespace mpcmf\apps\webAdministration\htdocs;

use mpcmf\system\application\applicationInstance;
use mpcmf\system\application\exception\webApplicationException;
use mpcmf\system\application\webApplicationBase;
use mpcmf\system\io\log;

require_once __DIR__ . '/../loader.php';

if(MPCMF_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

$log = log::factory();

$appName = explode('/', trim($_GET['path'], '/'))[0];

MPCMF_DEBUG && $log->addDebug("App name found: {$appName}");

$class = "mpcmf\\apps\\{$appName}\\{$appName}";
MPCMF_DEBUG && $log->addDebug("App class found: {$appName}");

if(is_a($class, '\mpcmf\system\application\webApplicationBase', true)) {
    $_SERVER['SCRIPT_NAME'] = '/';
    $_SERVER['PHP_SELF'] = $_REQUEST['path'];
    $_SERVER['REQUEST_URI'] = "{$_REQUEST['path']}?{$_SERVER['QUERY_STRING']}";
    MPCMF_DEBUG && $log->addDebug('Instantiating application class');
    $app = applicationInstance::getInstance();
    $app->setApplication(new $class());
    $app->run();
} else {
    $debug = [
        'class' => $class,
        'exists' => class_exists($class),
        'implements' => class_implements($class),
        'is_web' => is_a($class, '\webv2\webApplication', true),
    ];
    MPCMF_DEBUG && $log->addCritical("Invalid class `{$class}` as a web application!\n" . json_encode($debug));
    throw new webApplicationException("Invalid class `{$class}` as a web application!\n" . json_encode($debug), 500);
}