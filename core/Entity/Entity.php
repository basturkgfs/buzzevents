<?php
namespace Core\Entity;

/**
* Class Entity
* Elle permet de générer des données spécifiques à chaque objet (instance de classe)
*/
class Entity{
	
	public function __get($key){
		$method = 'get' . ucfirst($key);
		$this->$key = $this->$method();
		return $this->$key;
	}

}