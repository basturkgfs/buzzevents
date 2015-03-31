<?php
namespace App\Controller;

use Core\HTML\BootstrapForm;

use Core\Auth\DBAuth;

use \App;

/**
* 
*/
class UsersController extends AppController{

	public function create(){
		$this->loadModel('User');
		if (!empty($_POST)){
			unset($_POST['password2']);
			// $access[] = $_POST;
			if ($this->User->create($_POST)){
				// ******************************************* En test *******************************************
				$auth = new DBAuth(App::getInstance()->getDb());
				if ($auth->login($_POST)){
					echo "logged";
				}
				// header('Location: index.php?p=admin.events.index');
			}
		}
		$form = new BootstrapForm($_POST);
		$this->render('users.signup', compact('form', 'errors'));
	}
	
	public function login(){
		$errors = false;
		// $params[] = isset($access) ? $access : $_POST;
		if (!empty($_POST)){
			$auth = new DBAuth(App::getInstance()->getDb());
			if ($auth->login($_POST)){
				header('Location: index.php?p=admin.events.index');
			} else {
				$errors = true;
			}
		}
		$form = new BootstrapForm($_POST);
		$this->render('users.login', compact('form', 'errors'));
	}

}