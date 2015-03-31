<?php
namespace Core\Table;

use Core\Database\Database;

/**
* Classe Table
* Le model par défaut dont tous les autres héritent
*/
class Table{
	
	/**
	 * Contient le nom de la table à laquelle est rattachée le model
	 * @var string
	 */
	protected $table;

	/**
	 * [$db description]
	 * @var Database
	 */
	protected $db;

	/**
	 * [__construct description]
	 * @param Database $db [description]
	 */
	public function __construct(Database $db){
		$this->db = $db;
		if ( $this->table === null){
			$parts = explode('\\' ,get_class($this));
			$class_name = end($parts);
			$this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
		}
	}

	/**
	 * Cette fonction permet de retourner tous les enregistrements de la table
	 * @return array|object Le résultat de la requête
	 */
	public function all(){
		return $this->query("SELECT * FROM {$this->table}");
	}

	/**
	 * Cette fonction permet de retourner un enregistrement à l'aide de l'ID passé en paramètre
	 * @param  int $id ID de l'élément recherché
	 * @return array|object     Le résultat de la requête
	 */
	public function find($id){
		return $this->query("SELECT * FROM {$this->table}  WHERE id = ?", [$id], true);
	}

	/**
	 * Cette fonction permet de créer un enregistrement
	 * @param  array $fields Tous les champs de l'élément à créer et leur contenu
	 * @return array|object         Le résultat de la requête
	 */
	public function create($fields){
		$sql_parts = [];
		$attributes = [];
		foreach ($fields as $k => $v) {
			$sql_parts[] = "$k = ?";
			$attributes[] = $v;
		}
		// $sql_parts[] = 'date = ?';
		// $attributes[] = date('Y-m-d H:i:s');
		$sql_part = implode(', ',$sql_parts);
		return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
	}

	/**
	 * Cette fonction permet de modifier un enregistrement
	 * @param  int $id     ID de l'élément à modifier
	 * @param  array $fields Les champs à modifier dans l'élément en clé et en valeur leur contenu
	 * @return boolean       Le résultat de la requête
	 */
	public function update($id,$fields){
        
        $sql_parts =[];
        $attribute = [];
		foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?" ; 
            $attribute[] = $v;
		}
        $attribute[] = $id;
        $sql_part = implode(' ,', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attribute, TRUE) ;
	}

	/**
	 * Cette fonction permet de supprimer un enregistrement
	 * @param  int $id ID de l'élément à supprimer
	 * @return array|object     Le résultat de la requête
	 */
	public function delete($id){
		return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
	}

	/**
	 * [extract description]
	 * @param  [type] $key   [description]
	 * @param  [type] $value [description]
	 * @return [type]        [description]
	 */
	public function extract($key, $value){
		$records = $this->all();
		$return = [];
		foreach ($records as $v) {
			$return[$v->$key] = $v->$value;
		}
		return $return;
	}

	/**
	 * Cette fonction sert à faire une requête tout en déterminant, 
	 * à l'aide de ses attributs, si elle doit être préparée ou non
	 * @param  string  $statement  La requête sql à effectuer
	 * @param  array  $attributes Les attributs attendus dans la requête
	 * @param  boolean $one        Détermine si la requête retourne un seul ou plusieurs enregistrements
	 * @return array|object              Le résultat de la requête
	 */
	public function query($statement, $attributes = null, $one = false){
		if ($attributes){
			return $this->db->prepare(
				$statement, 
				$attributes, 
				str_replace('Table', 'Entity', get_class($this)), 
				$one
			);
		} else {
			return $this->db->query(
				$statement, 
				str_replace('Table', 'Entity', get_class($this)), 
				$one
			);
		}
	}

}