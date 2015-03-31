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
namespace App\Controller;

use \Core\HTML\BootstrapForm;

class CategoriesController extends AppController{

    public function __construct() {
        parent::__construct();
        $this->loadModel('Category');
        $this->loadModel('Event');
    }
    public function index() {
        $categories = $this->Category->all();
        $events = $this->Event->all();
        $this->render('categories.index', compact('categories','events')); 
    }    
    public function events() {
        $evenement = $this->Event->find($_GET['id']);
        if($evenement === FALSE){
            $this->notFound();
        }
        $categories = $this->Category->lastByCategory($_GET['id']);
        $evenements = $this->Event->all();
        $this->render('categories.category', compact('categories', 'evenements', 'evenement')); 
    } 
    public function show() {
        $categorie = $this->Category->findWithCategory($_GET['id']);
        $this->render('posts.show', compact('categorie')); 
    }
    
    public function estEntier($val) {
        if (((float)$val) > 0) {
            return TRUE;
        }
        return FALSE;
    }
}