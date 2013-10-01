<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
	array(
		$config->application->controllersDir,
        $config->application->modelsDir
	)
)->register();

$loader->registerClasses(
    array(
        'LoginForm' => __DIR__ . '/../../app/forms/UsersLoginForm.php',
        'CommentForm' => __DIR__ . '/../../app/forms/CommentForm.php',
    )
)->register();