<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BilletsController
 *
 * @author STEPHANE
 */
namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;
class BilletsController extends AppController{

    public function __construct() {
        parent::__construct();
        $this->loadModel('Billet');
    }
    public function index() {
        $items = $this->Billet->all();
        $this->render('admin.billets.index', compact('items')); 
    }
    
    public function add() {
        $estEntier = TRUE;
        if(!empty($_POST)){
            if($this->estEntier( $_POST['prix'])){
            $result = $this->Category->create([
                'libelle_categorie' => $_POST['libelle_categorie'],
                'prix' => $_POST['prix'],
                'event_id' => $_POST['event_id']
            ]);
               return $this->index();
            }  else {
                $estEntier = FALSE;
            }  
        }
        $items = $this->Category->extract('event_id','evenements');
        $form = new BootstrapForm($_POST);
        $this->render('admin.categories.edit', compact('form', 'items','estEntier'));
    }
    
    public function edit() {
        if(!empty($_POST)){
               $result = $this->Category->update($_GET['id'],[
                'libelle_categorie' => $_POST['libelle_categorie'],
                'prix' => $_POST['prix'],
                'event_id' => $_POST['event_id']
            ]);
//            var_dump($result);
		if ($result) {
                    return $this->index();
		}
        }
        $category = $this->Category->find($_GET['id']);
        $items = $this->Category->extract('event_id','evenements');
        $form = new BootstrapForm($category);
        $this->render('admin.categories.edit', compact('items','form','category'));
    }
    
    public function delete() {
        if(!empty($_POST)){
           $result =  $this->Category->delete($_POST['id']);
            if ($result){
                return $this->index();
            }
        }
    }
    
    public function estEntier($val) {
        if (((float)$val) > 0) {
            return TRUE;
        }
        return FALSE;
    }
}
