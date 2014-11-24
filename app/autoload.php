<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

AnnotationDriver::registerAnnotationClasses();
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

// Requirement for dompdf
define('DOMPDF_ENABLE_AUTOLOAD',false);
requre_once __DIR__ . '../vendor/dompdf/dompdf/dompdf_config.inc.php';


return $loader;
