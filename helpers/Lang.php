<?php
class Lang
{
	protected $langTable;
	protected $langsAvaiable;

	function __construct() {
		$this->langsAvaiable = array_diff(scandir(LANG_DIR, 1), array('..', '.'));
	}

	function loadLanguage($locale) {
		$this->langTable = include (LANG_DIR.'/'.$locale.'/ui.php');
	}

	function translate($value = null) {
		return $this->langTable[$value];
	}

	function getLanguages() {
		return $this->langsAvaiable;
	}

}
