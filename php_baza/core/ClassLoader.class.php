<?php

namespace core;

class ClassLoader {
    public function loadClassFromFile($path) {
        if (file_exists($path)) {
            require_once $path;
        }
    }

    public function loadClass($classname) {
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $classname) . '.class.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
}
