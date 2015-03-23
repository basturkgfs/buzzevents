<?php
namespace Core\Controller;

/**
* 
*/
class Controller{
	
	/**
	 * Contient le chemin du dossier des vues
	 * @var string
	 */
	protected $viewPath;

	/**
	 * Le nom du template à utiliser
	 * @var string
	 */
	protected $template;

	/**
	 * Cette fonction appelle la vue adequate
	 * @param  string $view      L'alias de la vue (ex: posts.index)
	 * @param  array $variables Les données envoyées par le controller à la vue
	 * @return void            Affiche la vue
	 */
	protected function render($view, $variables = []){
		ob_start();
		extract($variables);
		require($this->viewPath . str_replace('.', '/', $view) . '.php');
		$content = ob_get_clean();
		require($this->viewPath . 'templates/' . $this->template . '.php');
	}

	/**
	 * Cette fonction est appellé sur un page qui nécessite une authentification
	 * @return void [description]
	 */
	protected function forbidden(){
		header('HTTP/1.0 403 Forbidden');
		die('Acces interdit');
	}

	/**
	 * Cette fonction est appellé lorsqu'il y a une erreur 404
	 * @return void [description]
	 */
	protected function notFound(){
		header('HTTP/1.0 404 Not Found');
		die('Page introuvable');
	}

}