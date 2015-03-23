<?php
namespace Core\HTML;

/**
* Class Bootstrap
* Elle permet de générer un formulaire Bootstrap.
*/
class BootstrapForm extends Form{

	/**
	 * Cette fonction sert à entourer chaque champ du formulaire
	 * @param string $html Le code HTML à entourer
	 * @return string description
	 */
	protected function surround($html){
		return "<div class=\"form-group\">{$html}</div>";
	}
	
	/**
	 * Cette fonction crée les champs d'un formulaire spécialement "input" et "textarea"
	 * @param  string $name    Nom du champ
	 * @param  string $label   Label du champ
	 * @param  array $options Options de l'input
	 * @return string          Code HTML spécifique à la création d'un input
	 */
	public function input($name, $label, $options = []){
		$type = isset($options['type']) ? $options['type'] : 'text';
		$label = '<label>' . $label . '</label>';
		if ($type === 'textarea') {
			$input = '<textarea name="' . $name . '" class="form-control">' . $this->getValue($name) . '</textarea>';
		} else {
			$input = '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control">';
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
		$input = '<select class="form-control" name="' . $name . '">';
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
		return $this->surround('<button type="submit" class="btn btn-primary">' . $value . '</button>');
	}

}