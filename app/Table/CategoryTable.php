<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryTable
 *
 * @author STEPHANE
 */
namespace App\Table;

use Core\Table\Table;

class CategoryTable extends Table{
    
    protected $table = 'categories';
    
        
    public function all() {
        return $this->query(" 
                SELECT {$this->table}.id, {$this->table}.libelle_categorie, {$this->table}.prix, {$this->table}.nombre_place, event_id ,  `events`.nom AS evenements
                FROM {$this->table}
                LEFT JOIN`events`
                    ON categories.event_id = `events`.id
                ");/*ORDER BY categories.event_id ASC*/
    }
       public function findCategoryByEvent($id) {
        return $this->query(" 
                SELECT {$this->table}.id, {$this->table}.libelle_categorie, {$this->table}.prix, {$this->table}.nombre_place, event_id ,  `events`.nom AS evenements
                FROM {$this->table}
                LEFT JOIN `events`
                    ON categories.event_id = `events`.id
                WHERE event_id = ?
		", [$id]);/*ORDER BY categories.event_id ASC*/
    } 
}
