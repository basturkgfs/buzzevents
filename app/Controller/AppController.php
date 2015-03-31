<?php
namespace App\Controller;

use Core\Controller\Controller;

use \App;

/**
* 
*/
class AppController extends Controller{

	protected $template = 'default';
	
	function __construct(){
		$this->viewPath = ROOT . '/app/Views/';
	}

	public function loadModel($model_name){
		$this->$model_name = App::getInstance()->getTable($model_name);
	}

	public function setTitle($title){
		App::getInstance()->title = $title;
	}

	public function setHeader($header){
		App::getInstance()->header = $header;
	}

}