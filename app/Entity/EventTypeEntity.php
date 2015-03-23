<?php
namespace App\Entity;

use Core\Entity\Entity;

/**
* 
*/
class EventTypeEntity extends Entity{
	
	public function getUrl(){
		return 'index.php?p=events.type&id=' . $this->id;
	}

}