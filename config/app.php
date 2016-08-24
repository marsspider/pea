<?php

include('helpers/Lang.php');
include('handlers/handlers.php');

define("BLADEONE_MODE",0);

use eftec\bladeone\BladeOne;

class App {

	public static $blade;
	public static $locale;
	public static $langHelper;

	function __construct() {

		App::$locale = 'it';
		App::$langHelper = new Lang;
		App::$langHelper->loadLanguage(App::$locale);
		App::$blade = new BladeOne(VIEWS,CACHE);

		function tr($value) {
			return App::$langHelper->translate($value);
		}

	}

	static function lang() {
		return App::$locale;
	}



}
