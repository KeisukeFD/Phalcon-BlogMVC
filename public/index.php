<?php

error_reporting(E_ALL);


try {
	$debug = new \Phalcon\Debug();
	$debug->listen();

	/**
	 * Read the configuration
	 */
	$config = include __DIR__ . "/../app/config/config.php";

	include __DIR__ . "/../Vendor/utils.php";

	/**
	 * Read auto-loader
	 */
	include __DIR__ . "/../app/config/loader.php";

	/**
	 * Read services
	 */
	include __DIR__ . "/../app/config/services.php";

	/**
	 * Handle the request
	 */
	$application = new \Phalcon\Mvc\Application($di);
	
	echo $application->handle()->getContent();

} catch (\Exception $e) {
	echo $e->getMessage();
} 