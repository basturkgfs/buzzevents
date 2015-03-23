<?php
namespace Core;

/**
* 
*/
class Config {
	
	private $settings = [];
	private static $_instance;
	private $file;

	public static function getInstance($file){
		if (is_null(self::$_instance)){
			self::$_instance = new Config($file);
		}
		return self::$_instance;
	}
	
	/**
	 * [__construct description]
	 * @param [type] $file Le fichier contenant les accès à la base de données
	 */
	public function __construct($file){
		$this->settings = require($file);
	}

	/**
	 * [get description]
	 * @param  [type] $key [description]
	 * @return string      [description]
	 */
	public function get($key){
		if (!isset($this->settings[$key])){
			return null;
		}
		return $this->settings[$key];
	}

}