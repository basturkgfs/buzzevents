<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoryEntity
 *
 * @author STEPHANE
 */
namespace App\Entity;

use \Core\Entity\Entity;

class AcheteurEntity extends Entity{
    
    public function getUrl() {
        return 'index.php?p=posts.category&id='. $this->id;
    }
}
