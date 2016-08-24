<?php

class HomeHandler {
	function get($name = '') {
		echo App::$blade->run("index",array("lang"=>App::$locale, "data" => $name));
	}
}
