<?php
namespace Core\Auth;

use Core\Database\Database;

/**
 * 
 */
class DBAuth {

	/**
	 * Instance de la base de données
	 * @var Database
	 */
	private $db;
	
	/**
	 * [__construct description]
	 * @param Database $db Instance de la base de données
	 */
	public function __construct(Database $db){
		$this->db = $db;
	}

	/**
	 * Cette fonction retourne l'ID de l'utilisateur connecté
	 * @return int|boolean L'identifiant de l'utilisateur ou 'false'
	 */
	public function getUserId(){
		if ($this->logged()){
			return $_SESSION['auth'];
		}
		return false;
	}

	/**
	 * Cette fonction permet l'authentification d'un utilisateur
	 * @param  string $username Le nom d'utilisateur
	 * @param  string $password Le mot de passe
	 * @return boolean           Retourne 'true' ou 'false' selon que la connexion ait réussie ou non
	 */
	public function login($params = array()){
		var_dump([$params['username']]);
		var_dump([$params['username']]);
		var_dump([$params['username']]);
		var_dump([$params['password']]);
            $user = $this->db->prepare('SELECT * FROM users WHERE login = ?', [$params['username']], null, true);
                             		
		if ($user){
			 if ($user->password === sha1($params['password'])){
				$_SESSION['auth'] = $user->id;
				return true;
                         }
		}
		return false;
	}

	/**
	 * Cette fonction vérifie s'il y a un utilisateur connecté
	 * @return boolean Si 'true', l'utilisateur est connecté. Si 'false', non
	 */
	public function logged(){
		return isset($_SESSION['auth']);
	}

}