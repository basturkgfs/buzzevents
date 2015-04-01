<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AcheteursController
 *
 * @author STEPHANE
 */
namespace App\Controller;

use Core\HTML\BootstrapForm;

class AcheteursController extends AppController{

    public function __construct() {
        parent::__construct();
        $this->loadModel('Category');
    }
    public function index() {
        if(isset($_GET['id'])){
            $items = $this->Category->findCategoryByEvent($_GET['id']); 
            if (!empty($items)){
                $form = new BootstrapForm($items);
                $this->render('acheteurs.index', compact('form', 'items'));
            }else {
                $this->notFound();
            }
        }  else {
                $this->notFound();
        }
    }
    
}
