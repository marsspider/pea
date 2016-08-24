<?php
class Lang
{
	protected $langTable;

	function loadLanguage($locale) {
		$this->langTable = include (getcwd().'/lang/'.$locale.'/ui.php');
	}

	function translate($value = null) {
		return $this->langTable[$value];
	}
}
