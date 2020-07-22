<?php


// \FinatiTaing\Fashlorton\Fashlorton


spl_autoload_register(function ($className) {
    if (substr($className, 0, 1) === '\\') {
        $className = substr($className, 1);
    }

    $parts = explode('\\', $className);

    $path = __DIR__ . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR;
    $class = null;
    foreach ($parts as $index => $part) {
        if ($index >= count($parts) - 1) {
            $class = $part;
        } else {
            $path .= $part . DIRECTORY_SEPARATOR;
        }
    }

    $file = $path . $class . '.php';

    if (file_exists($file)) {
        include $file;
    } else {
        die("Class $className not found!");
    }
});
