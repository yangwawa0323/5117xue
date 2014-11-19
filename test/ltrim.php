<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$string = 'Symfony\Bundle\Framework\Controller';
if (false !== $pos = strrpos($string, '\\')) {
    $namespace = substr($string, 0, $pos);
    $classname = substr($string, $pos + 1);
    $filename = __DIR__ . DIRECTORY_SEPARATOR;
    $filename .= strtr($namespace, '\\', DIRECTORY_SEPARATOR);
    $filename .= DIRECTORY_SEPARATOR . $classname;
    printf("We got namespace is '%s' , classname is '%s'\n", $namespace, $classname);
    printf("We got filename is '%s' \n", $filename);
    if (file_exists($filename)) {
        require_once $filename;
    } else {
        return false;
    }
}
