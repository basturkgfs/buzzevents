<?php
namespace App\Controller\Admin;

use \App;

use Core\Auth\DBAuth;

/**
* 
*/
class AppController extends \App\Controller\AppController{

	protected $template = 'user';
	
	function __construct(){
		parent::__construct();
		// Authentification
		$app = App::getInstance();
		$auth = new DBAuth($app->getDb());
		if (!$auth->logged()){
			// $this->forbidden();
			if ($_GET['p'] != 'users.login'){
				header('Location: index.php?p=users.login');
			}
		}
	}

}