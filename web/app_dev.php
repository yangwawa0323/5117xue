<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
//umask(0000);

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.


// Open the configuration from file. Each line in the file is an 
// remote debug ip address which is allowed to connect app_dev.php

$remoteDebugIPs = array('127.0.0.1','fe80::1','::1');


if($lines = file("./debug.ip.address.list"))
{ 
	foreach (array_unique($lines) as $value)
	{
		// remove the new line invisible char "\n"
		$value = rtrim($value);

		// the debug.ip.address.list configuration file format
		// (202.103.1.98), the following line remove from left '('
		// and from right ')' mark to get the IP address.
		$value = substr( $value, 1, strlen($value)-2);
		
		
		array_push($remoteDebugIPs,$value);
		array_push($remoteDebugIPs,'1.1.1.1');
	}

}

//var_dump($remoteDebugIPs);

//exit;

if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !(in_array(@$_SERVER['REMOTE_ADDR'], $remoteDebugIPs) || php_sapi_name() === 'cli-server')
) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/../app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
