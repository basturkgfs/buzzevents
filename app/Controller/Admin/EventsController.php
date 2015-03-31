<?php
namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

/**
* 
*/
class EventsController extends AppController{
	
	public function __construct(){
		parent::__construct();
		$this->loadModel('Event');
	}

	public function index(){
		$this->setHeader('Administrer les évènements');
		$events = $this->Event->findByUser($_SESSION['auth']);
		$this->render('admin.events.index', compact('events'));
	}

	public function add(){
		if (!empty($_POST)) {
			$result = $this->Event->create([
				'nom' => $_POST['nom'],
				'lieu' => $_POST['lieu'],
				'ville' => $_POST['ville'],
				'pays' => $_POST['pays'],
				'description' => $_POST['description'],
				'type' => $_POST['type'],
				'date_debut' => $_POST['date_debut'],
				'user_id' => 3
			]);
			if ($result) {
				return $this->index();
			}
		}
		$this->setHeader('Nouvel évènement');
		$this->loadModel('EventType');
		$types = $this->EventType->extract('id', 'libelle_type_event');
		$form = new BootstrapForm();
		$this->render('admin.events.add', compact('types', 'form'));
	}

	public function edit(){
		if (!empty($_POST)) {
			$result = $this->Event->update([
				'nom' => $_POST['nom'],
				'lieu' => $_POST['lieu'],
				'ville' => $_POST['ville'],
				'pays' => $_POST['pays'],
				'description' => $_POST['description'],
				'type' => $_POST['type'],
				'date_debut' => $_POST['date_debut']
			]);
			if ($result) {
				return $this->index();
			}
		}
		$this->setHeader('Editer un évènements');
		$this->loadModel('EventType');
		$types = $this->EventType->extract('id', 'libelle_type_event');
		$event = $this->Event->findWithType($_GET['id']);
		$form = new BootstrapForm($event);
		$this->render('admin.events.edit', compact('types', 'form', 'event'));
	}

	public function delete(){
		if (!empty($_POST['id'])){
			$this->Event->delete($_POST['id']);
			return $this->index();
		}
	}
	
}