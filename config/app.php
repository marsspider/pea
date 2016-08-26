<?php

include('helpers/Lang.php');
include('handlers/handlers.php');

define("BLADEONE_MODE",0);

use eftec\bladeone\BladeOne;

class App {

	public static $blade;
	public static $locale;
	public static $currentLang;
	public static $langHelper;

	function __construct() {

		App::$locale = 'it';
		App::$currentLang = 'it';
		App::$langHelper = new Lang;
		App::$langHelper->loadLanguage(App::$currentLang);
		App::$blade = new BladeOne(VIEWS,CACHE);

		function tr($value) {
			return App::$langHelper->translate($value);
		}

	}

	static function updateLang($newLang) {
		App::$currentLang = $newLang;
		App::$langHelper->loadLanguage(App::$currentLang);
	}

	static function lang() {
		return App::$currentLang;
	}

	static function langChoose($container = 'ul', $iterator = 'li', $container_class = '') {
		$ls = App::$langHelper->getLanguages();
		$current_path = ltrim($_SERVER['REQUEST_URI'], '/');
		$path_elements = explode("/", $current_path);
		foreach ($ls as &$item) {
			if ($path_elements[0] == $item) {
				array_shift($path_elements);
				$current_path = implode("/", $path_elements);
			}
		}
		$output = '';
		$output .= '<'.$container.' class="'.$container_class.'">';
		foreach ($ls as &$item) {
			$itemClass = ($item == App::$currentLang)?'class="selected"':'';
			$lang_path = ($item != App::$locale)?'/'.$item.'/'.$current_path:'/'.$current_path;
			$output .= '<'.$iterator.' '.$itemClass.'"><a href="'.$lang_path.'">'.$item.'</a></'.$iterator.'>';
		}
		$output .= '</'.$container.'>';
		return($output);
	}

}
