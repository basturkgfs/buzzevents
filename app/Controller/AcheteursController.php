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

class AcheteursController extends AppController {

    public $i, $j = 0;
    
    public function __construct() {
        parent::__construct();
        $this->loadModel('Category');
        $this->loadModel('Acheteur');
        $this->loadModel('Billet');
    }
    
    public function info_clients() {
        if(isset($_GET['id'])){
            $items = $this->Category->findCategoryByEvent($_GET['id']); 
            if (!empty($items)){
                if(!empty($_POST)){
                    $this->add();
                    $form = new BootstrapForm($items);
                    return $this->render('acheteurs.reservations', compact('form', 'items'));
                }
            }else {
                $this->notFound();
        }
        } else {
                $this->notFound();
        } 
        $form = new BootstrapForm($items);
        $this->render('acheteurs.info_clients', compact('form', 'items'));
    }
    
    public function reservations() {
        if(isset($_GET['id'])){
            $items = $this->Category->findCategoryByEvent($_GET['id']); 
            
            $_SESSION['event']= $_GET['id'];
            if(!empty($_POST)){
                foreach ($items as $category){
                $h = 1;
                    $_SESSION['categorie_'.$this->i] = $category->id;
                    $_SESSION['libelle_categorie_'.$this->i] = $category->libelle_categorie;
                    $_SESSION['nombre_place_'.$this->i] = $_POST[$this->j];
                    while ($h <= $_POST[$this->j]){
                            $result = $this->Billet->create([
                                'acheteur' => $_POST['acheteur'],
                                'event' => $_POST['event'],
                                'categorie' => $_SESSION['categorie_'.$this->i]
                            ]);
                      $h++;
                    }
                    $this->i++;
                    $this->j++;
                }
                
                $form = new BootstrapForm($items);
                $this->render('acheteurs.previsualisation', compact('form', 'items'));
            }
        }else {
                $this->notFound();
        }
    }    
    public function previsualisation() {
        
//        on va faire une boucle pour génerer un nombre de ticket égal 
        
        $form = new BootstrapForm($id);
        $this->render('acheteurs.previsualisation',compact('form'));
    }
   
    public function add() {
        if(!empty($_POST)){
            $_SESSION['mail'] = $_POST['email'];
            $result = $this->Acheteur->create([
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'telephone' => $_POST['telephone'],
                'email' => $_POST['email']
            ]);
            $acheteur = $this->Acheteur->findIdAcheteur($_SESSION['mail']); 
            $_SESSION['acheteur'] = $acheteur->id;
        }
    }
        public function addBillet() {
        if(!empty($_POST)){
        }
    }
}
