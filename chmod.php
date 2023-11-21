<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function chmod_r($path) {
    $dir = new DirectoryIterator($path);
    foreach ($dir as $item) {
        if($item->getFileName() == '.' || $item->getFileName() == '..'){
            continue;
        }
        chmod($item->getPathname(), 0775);
        echo $item->getPathname() . " -- " . substr(sprintf('%o', fileperms($item->getPathname())), -4) . "<br/>";
        if ($item->isDir() && !$item->isDot()) {
            chmod_r($item->getPathname());
        }
    }
}

chmod_r(__DIR__);
?>