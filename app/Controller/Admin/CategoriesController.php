<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriesController
 *
 * @author STEPHANE
 */
namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;

class CategoriesController extends AppController{

    public function __construct() {
        parent::__construct();
        $this->loadModel('Category');
    }
    public function index() {
        $items = $this->Category->all();
        $this->render('admin.categories.index', compact('items')); 
    }
    
    public function add() {
        $estEntier = TRUE;
        if(!empty($_POST)){
            if(($this->estEntier($_POST['prix'], $_POST['nombre_place'] )) ){
            $result = $this->Category->create([
                'libelle_categorie' => $_POST['libelle_categorie'],
                'prix' => $_POST['prix'],
                'event_id' => $_POST['event_id'],
                'nombre_place' => $_POST['nombre_place']
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
        $estEntier = TRUE;
        if(!empty($_POST)){
            if(($this->estEntier($_POST['prix'], $_POST['nombre_place'] )) ){
                $result = $this->Category->update($_GET['id'],[
                'libelle_categorie' => $_POST['libelle_categorie'],
                'prix' => $_POST['prix'],
                'event_id' => $_POST['event_id'],
                'nombre_place' => $_POST['nombre_place']
            ]);
		if ($result) {
                    return $this->index();
		}
            }  else {
                $estEntier = FALSE;
            } 
        }
        $category = $this->Category->find($_GET['id']);
        $items = $this->Category->extract('event_id','evenements');
        $form = new BootstrapForm($category);
        $this->render('admin.categories.edit', compact('items','form','category','estEntier'));
    }
    
    public function delete() {
        if(!empty($_POST)){
           $result =  $this->Category->delete($_POST['id']);
            if ($result){
                return $this->index();
            }
        }
    }
    
    public function estEntier() {
        $nombreArguments = func_num_args();
        $argument = func_get_args();
        $i = 0;
        while ($i <= $nombreArguments-1):
            if (is_numeric($argument[$i])) {
                $estentier = TRUE;
            }  else {
                $estentier = FALSE;
                break;
            }
            $i++;
        endwhile;
        return $estentier;
    }
}