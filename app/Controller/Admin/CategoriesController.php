<?php
namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

/**
* 
*/
class CategoriesController extends AppController{
	
	public function __construct(){
		parent::__construct();
		$this->loadModel('Category');
	}

	public function index(){
		$categories = $this->Category->all();
		$this->render('admin.categories.index', compact('categories'));
	}

	public function add(){
		if (!empty($_POST)) {
			$result =  $this->Category->create([
				'libelle_categorie' => $_POST['libelle_categorie'],
				'prix' => $_POST['prix']
				// 'event_id' => 3
			]);

			if ($result){
				return $this->index();
			}
		}
		$form = new BootstrapForm;
		$this->render('admin.categories.add', compact('form'));
	}

	public function edit(){
		if (!empty($_POST)) {
			$result =  $this->Event->update([
				'libelle_categorie' => $_POST['libelle_categorie'],
				'prix' => $_POST['prix'], 
				// 'event_id' => 3
			]);
		}
		$category = $this->Category->findWithEvent($_GET['id']);
		$form = new BootstrapForm($category);
		$this->render('admin.categories.add', compact('form'));
	}

	public function delete(){

	}

}