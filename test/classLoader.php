<?php

class ClassAutoloader {

    public function __construct() {
        spl_autoload_register(array($this, 'loader'));
    }

    public static function loader($className) {

        if (strpos($className, '\\')) {
            $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        }
        
        // the folder to load that should goto the parent '..' first then downward.
        $classFilename = __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . $className . '.php';

        if (file_exists($classFilename)) {
            include_once $classFilename;
        } else {
            throw new \RuntimeException('Can not loader the class -> ' . $classFilename);
        }
    }

}

/*
  $autoloader = new ClassAutoloader();


  $obj = new class1();
  $obj = new class2();
 */


