<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

if(!file_exists($filename = __DIR__ . DIRECTORY_SEPARATOR .'../vendor/autoload.php')){
    throw new \RuntimeException('Install dependences to run this script');
}
$loader = require_once $filename;



$loader->add('Documents', __DIR__);

$connection = new Connection();
$config = new Configuration();

$config->setProxyDir(__DIR__ .'/Proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . '/Hydrators');
$config->setHydratorNamespace('Hydrators');
$config->setDefaultDB('doctrine_orm');

$config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__ .'/Documents'));
AnnotationDriver::registerAnnotationClasses();


$dm = DocumentManager::create($connection,$config);



/* AutoLoader Class  */
require_once './classLoader.php';

$classLoader = new ClassAutoloader();