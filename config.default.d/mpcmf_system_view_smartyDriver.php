<?php
/**
 * @author greevex
 * @date   : 11/16/12 5:11 PM
 */

\mpcmf\system\configuration\config::setConfig(__FILE__, [
    'compile_dir' => MPCMF_CACHE . '/smarty/templates_c/',
    'config_dir' => MPCMF_CACHE . '/smarty/configs/',
    'cache_dir' => MPCMF_CACHE . '/smarty/templates_cache/',
    'cache_lifetime' => 3600,
    'caching' => true,
    'debugging' => false,
    'force_compile' => true
]);