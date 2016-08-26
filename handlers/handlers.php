<?php

class HomeHandler {
	function get($name = '') {
		$ls = App::$langHelper->getLanguages();
		$current_path = ltrim($_SERVER['REQUEST_URI'], '/');
		$path_elements = explode("/", $current_path);
		foreach ($ls as &$item) {
			if ($path_elements[0] == $item) {
				array_shift($path_elements);
				$current_path = implode("/", $path_elements);
			}
		}
		foreach ($ls as &$item) {
			if (substr($name, 0, 4) == $item) {
				$lang = $item;
				break;
			} else {
				$lang = 'it';
			}
		}
		App::updateLang($lang);
		echo App::$blade->run("index",array("data" => $current_path));
	}
}
