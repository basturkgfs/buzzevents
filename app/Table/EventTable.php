<?php
namespace App\Table;

use Core\Table\Table;

/**
* 
*/
class EventTable extends Table{
	
	/**
	 * Contient le nom de la table à laquelle est rattachée le model
	 * @var string
	 */
	protected $table = 'events';

	public function all(){
		return $this->query("
			SELECT {$this->table}.id, {$this->table}.nom, {$this->table}.description, {$this->table}.date_create, {$this->table}.date_update, {$this->table}.date_delete, type_event.libelle_type_event as type 
			FROM {$this->table}
			LEFT JOIN type_event ON type_event.id = type 
		");
	}

	/**
	 * Cette fonction permet de retourner un enregistrement à l'aide de l'ID passé en paramètre
	 * @param  int $id ID de l'élément recherché
	 * @return array|object     Le résultat de la requête
	 */
	public function find($id){
		return $this->query("
			SELECT {$this->table}.id, {$this->table}.nom, {$this->table}.description, {$this->table}.date_create, {$this->table}.date_update, {$this->table}.date_delete, type_event.libelle_type_event as type 
			FROM {$this->table}
			LEFT JOIN type_event ON type_event.id = type 
			WHERE {$this->table}.id = ?
		", [$id], true);
	}

	/**
	 * Cette fonction permet de retourner un enregistrement à l'aide de l'ID passé en paramètre
	 * @param  int $id ID de l'élément recherché
	 * @return array|object     Le résultat de la requête
	 */
	public function findWithType($id){
		return $this->query("
			SELECT {$this->table}.id, {$this->table}.nom, {$this->table}.description, {$this->table}.date_debut, {$this->table}.lieu, {$this->table}.ville, {$this->table}.pays, {$this->table}.date_create, {$this->table}.date_update, {$this->table}.date_delete, {$this->table}.type 
			FROM {$this->table}
			LEFT JOIN type_event ON type_event.id = type 
			WHERE {$this->table}.id = ?
		", [$id], true);
	}

	public function findByType($id){
		return $this->query("
			SELECT {$this->table}.id, {$this->table}.nom, {$this->table}.description, {$this->table}.date_create, {$this->table}.date_update, {$this->table}.date_delete 
			FROM {$this->table} 
			WHERE {$this->table}.type = ?
		", [$id]);
	}

	public function findByUser($id){
		return $this->query("
			SELECT {$this->table}.id, {$this->table}.nom, {$this->table}.description, {$this->table}.date_create, {$this->table}.date_update 
			FROM {$this->table}
			WHERE {$this->table}.user_id = ?
		", [$id]);
	}
	
}