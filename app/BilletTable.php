<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BilletTable
 *
 * @author STEPHANE
 */
namespace App\Table;

use Core\Table\Table;

class BilletTable extends Table{
    
    protected $table = 'billet';
    
        
    public function all() {
        return $this->query(" 
                SELECT {$this->table}.id, {$this->table}.code_barre, {$this->table}.categorie AS categorie
                FROM {$this->table}
                LEFT JOIN categories
                  ON categories.id = {$this->table}.categorie
                ");/*ORDER BY categories.event_id ASC*/
    }
}
