<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AcheteurTable
 *
 * @author STEPHANE
 */
namespace App\Table;

use Core\Table\Table;

class AcheteurTable extends Table{
    
    protected $table = 'acheteurs';

       public function findIdAcheteur($email) {
        return $this->query(" 
                SELECT id   
                FROM {$this->table}
                WHERE email = ? "
                , [$email], TRUE);
    }     
}
