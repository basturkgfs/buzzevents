<?php
namespace App\Table;

use Core\Table\Table;

/**
* 
*/
class CategoryTable extends Table{

	protected $table = 'categories';
	
	public function findWithEvent($id){
		return $this->query("
			SELECT {$this->table}.id, {$this->table}.libelle_categorie, {$this->table}.prix, {$this->table}.event_id, {$this->table}.date_create, {$this->table}.date_update, {$this->table}.date_delete 
			FROM {$this->table} 
			WHERE {$this->table}.id = ?
		", [$id], true);
	}
	
}