<?php
namespace Core\HTML;

/**
* Class Form
* Elle permet de générer un formulaire.
*/
class Form{
	
	/**
	 * Tableau de donées destinées au formulaire
	 * @var [type]
	 */
	private $data;

	/**
	 * Tag utilisé pour entourer les champs
	 * @var string
	 */
	public $surround = 'p';

	/**
	 * [__construct description]
	 * @param array $data Données destinées au formulaire
	 */
	public function __construct($data = array()){
		$this->data = $data;
	}

	/**
	 * Cette fonction sert à entourer chaque champ du formulaire
	 * @param string $html Le code HTML à entourer
	 * @return string description
	 */
	protected function surround($html){
		return "<{$this->surround}>{$html}</{$this->surround}>";
	}

	/**
	 * Retourne la valeur de l'index passé en paramètre
	 * @param  string $index Index de la valeur à récupérer
	 * @return string        La valeur 
	 */
	protected function getValue($index){
		if (is_object($this->data)){
			return $this->data->$index;
		}
		return isset($this->data[$index]) ? $this->data[$index] : null;
	}

	/**
	 * Cette fonction crée les champs d'un formulaire spécialement "input" et "textarea"
	 * @param  string $name    Nom du champ
	 * @param  string $label   Label du champ
	 * @param  array $options Options de l'input
	 * @return string          Code HTML spécifique à la création d'u input
	 */
	public function input($name, $label, $options = []){
		$type = isset($options['type']) ? $options['type'] : 'text';
		$label = '<label>' . $label . '</label>';
		if ($type === 'textarea') {
			$input = '<textarea name="' . $name . '" >' . $this->getValue($name) . '"</textarea>';
		} else {
			$input = '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" >';
		}
		return $this->surround($label . $input);
	}
	
	/**
	 * Cette fonction crée un champ select
	 * @param  string $name    Nom du champ
	 * @param  string $label   Label du champ
	 * @return string          Code HTML spécifique à la création d'un select
	 */
	public function select($name, $label, $options){
		$label = '<label>' . $label . '</label>';
		$input = '<select name="' . $name . '">';
		foreach ($options as $k => $v) {
			$attribute = '';
			if ($k == $this->getValue($name)){
				$attribute = ' selected';
			}
			$input .= "<option value='$k'$attribute>$v</option>";
		}
		$input .= '</select>';
		return $this->surround($label . $input);
	}

	/**
	 * Cette fonction crée le bouton de soumission du formulaire
	 * @param  string $value La valeur du bouton
	 * @return string        Code HTML de crééation du bouton
	 */
	public function submit($value){
		if (!isset($value)){
			$value = 'Envoyer';
		}
		return $this->surround('<button type="submit">' . $value . '</button>');
	}

}