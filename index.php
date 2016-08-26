<?php

	define("BASE_PATH", __DIR__);

	require __DIR__ . '/vendor/autoload.php';
	require_once __DIR__ . '/config/config.php';
	require_once __DIR__ . '/config/app.php';

	$app = new App();

	// Routes

	ToroHook::add("404", function() {
		echo "Not found";
	});

	Toro::serve(array(
		"/" => "HomeHandler",
		"/:string" => "HomeHandler",
		"/:string/:string" => "HomeHandler",
		"/:string/:string/:string" => "HomeHandler",
	));

?>
