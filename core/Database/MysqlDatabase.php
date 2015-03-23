<?php
namespace Core\Database;

use \PDO;

/**
* Class MysqlDatabase
* Permet de gérer la connexion à Mysql
*/
class MysqlDatabase extends Database{

	/**
	 * Le nom de la base de données
	 * @var string
	 */
	private $db_name;
	/**
	 * L'utilisateur de la base de données
	 * @var string
	 */
	private $db_user;
	/**
	 * Le mot de passe de l'utilisateur
	 * @var string
	 */
	private $db_pass;
	/**
	 * L'adresse de la base de données
	 * @var string
	 */
	private $db_host;
	/**
	 * La connexion à la base de données
	 * @var \PDO
	 */
	private $pdo;

	/**
	 * [__construct description]
	 * @param string $db_name Le nom de la base de données
	 * @param string $db_user L'utilisateur de la base de données
	 * @param string $db_pass Le mot de passe de l'utilisateur
	 * @param string $db_host L'adresse de la base de données
	 */
	public function __construct($db_name, $db_user, $db_pass, $db_host){
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->db_host = $db_host;
	}

	/**
	 * [getPDO description]
	 * @return \PDO
	 */
	private function getPDO(){
		if ($this->pdo === null){
			$pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host . '', $this->db_user, $this->db_pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}

		return $this->pdo;
	}

	/**
	 * Cette fonction sert à faire une requête non préparée
	 * @param  string  $statement  La requête sql à effectuer
	 * @param  string  $class_name Le nom de la classe avec les namespace pour formater le résultat
	 * @param  boolean $one        Détermine si la requête retourne un seul ou plusieurs enregistrements
	 * @return array|object              Le résultat de la requête
	 */
	public function query($statement, $class_name = null, $one = false){
		$req = $this->getPDO()->query($statement);
		if (
			strpos($statement, 'UPDATE') === 0 ||
			strpos($statement, 'INSERT') === 0 ||
			strpos($statement, 'DELETE') === 0 
		){
			return $req;
		}
		if ($class_name === null){
			$req->setFetchMode(PDO::FETCH_OBJ);
		} else {
			$req->setFetchMode(PDO::FETCH_CLASS, $class_name);
		}
		if ($one) {
			$data = $req->fetch();
		} else {
			$data = $req->fetchAll();
		}
		return $data;
	}

	/**
	 * Cette fonction sert à faire une requête préparée
	 * @param  string  $statement  La requête sql préparée à effectuer 
	 * @param  array  $attributes Les attributs attendus dans la requête
	 * @param  string  $class_name Le nom de la classe les namespace pour formater le résultat
	 * @param  boolean $one        Détermine si la requête retourne un seul ou plusieurs enregistrements
	 * @return array|object             Le résultat de la requête
	 */
	public function prepare($statement, $attributes, $class_name = null, $one = false){
		$req = $this->getPDO()->prepare($statement);
		try {
			$res = $req->execute($attributes);
		} catch(PDOException $e){
			echo $e->getMessage();
		}
		if (
			strpos($statement, 'UPDATE') === 0 ||
			strpos($statement, 'INSERT') === 0 ||
			strpos($statement, 'DELETE') === 0 
		){
			return $res;
		}
		if ($class_name === null){
			$req->setFetchMode(PDO::FETCH_OBJ);
		} else {
			$req->setFetchMode(PDO::FETCH_CLASS, $class_name);
		}
		if ($one) {
			$data = $req->fetch();
		} else {
			$data = $req->fetchAll();
		}
		
		return $data;
	}

	/**
	 * Cette fonction retourne l'ID du dernier enregistrement fait dans la base de données
	 * @return int ID du dernier enregistrement fait dans la base de données
	 */
	public function lastInsertId(){
		return $this->getPDO()->lastInsertId();
	}

}