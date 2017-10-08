<?php

use Monolog\Logger;
use mpcmf\system\configuration\config;
use mpcmf\system\configuration\environment;

$path = MPCMF_CACHE . '/logs';

$defaultLevel = Logger::DEBUG;
config::setConfig(__FILE__, [
    'default' => [
        'name' => 'BaseLog',
        'path' => 'php://stdout',
        'level' => $defaultLevel
    ],
    'applicationBase' => [
        'name' => 'ApplicationLog',
        'path' => 'php://stdout',
        'level' => $defaultLevel
    ],
    'controllerBase' => [
        'name' => 'ControllerLog',
        'path' => 'php://stdout',
        'level' => $defaultLevel
    ],
]);

$productionLevel = MPCMF_DEBUG ? Logger::DEBUG : Logger::INFO;
config::setConfig(__FILE__, [
    'default' => [
        'name' => 'BaseLog',
        'path' => "{$path}/default.log",
        'level' => $productionLevel
    ],
    'applicationBase' => [
        'name' => 'ApplicationLog',
        'path' => "{$path}/application.log",
        'level' => $productionLevel
    ],
    'controllerBase' => [
        'name' => 'ControllerLog',
        'path' => "{$path}/controller.log",
        'level' => $productionLevel
    ],
], environment::ENV_PRODUCTION);

MPCMF_DEBUG && config::setConfigByEnvironment(__FILE__, environment::ENV_PRODUCTION);