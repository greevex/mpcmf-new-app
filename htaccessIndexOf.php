<?php

namespace mpcmf\apps\webAdministration\htdocs;

error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_SERVER['PHP_SELF'] == '/favicon.ico') {
    return false;
}

$filepath = realpath($_SERVER['DOCUMENT_ROOT'] . $_SERVER['PHP_SELF']);
if(strpos($filepath, $_SERVER['DOCUMENT_ROOT']) === false) {
    return ':P';
}

$exists = file_exists($filepath);
if($exists && !is_dir($filepath)) {
    require_once __DIR__ . '/vendor/autoload.php';

    header('Content-Type: ' . \GuzzleHttp\Psr7\mimetype_from_extension($filepath));

    echo file_get_contents($filepath);
    exit;
} elseif(!$exists) {

    return null;
}

require_once __DIR__ . '/vendor/autoload.php';

echo <<<TPL
<html>
<head>
<title>Index of {$_SERVER['PHP_SELF']}</title>
<style>a{text-decoration:none;font-size:14px;font-weight:bold;}</style>
</head>
<body bgcolor="white">
<h1>Index of {$_SERVER['PHP_SELF']}</h1><hr><pre>
TPL;

$pattern = "<a href=\"%s\">%-12s</a> %30s  /  %s  /  %-5sMB\n";
foreach(scandir($filepath) as $file) {
    $fullpath = $filepath . '/' . $file;
    $localpath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $fullpath);
    $mtime = date("Y-m-d H:i:s", filemtime($fullpath));
    printf($pattern, $localpath, $file, \GuzzleHttp\Psr7\mimetype_from_extension($filepath), $mtime, is_dir($fullpath) ? '-' : number_format(filesize($fullpath)/1048576, 2));
}

echo <<<TPL
</pre><hr></body>
</html>
TPL;
