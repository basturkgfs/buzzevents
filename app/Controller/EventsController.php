<?php
namespace App\Controller;


/**
* 
*/
class EventsController extends AppController{
	
	/**
	 * Contient le chemin du dossier des vues
	 * @var string
	 */
	protected $viewPath;

	public function __construct(){
		parent::__construct();
		$this->loadModel('Event');
		$this->loadModel('EventType');
	}

	public function index(){
		// $events = App::getInstance()->getTable('Event')->all()
		$events = $this->Event->all();
		$types = $this->EventType->all();
		$this->render('events.index', compact('events', 'types'));
	}

	public function show(){
		$event = $this->Event->find($_GET['id']);
		$this->render('events.show', compact('event'));
	}

	public function type(){
		$type = $this->EventType->find($_GET['id']);
		$types = $this->EventType->all();
		$events = $this->Event->findByType($_GET['id']);
		$this->render('events.type', compact('type', 'types', 'events'));
	}

}