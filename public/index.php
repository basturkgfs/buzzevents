<?php
define('ROOT', dirname(__DIR__));

require ROOT . '/app/App.php';
App::load();

if (isset($_GET['p'])){
	$page = $_GET['p'];
} else {
	$page = 'events.index';
}

$page = explode('.', $page);
if ($page[0] === 'admin'){
	$action = $page[2];
	$controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
} else {
	$action = $page[1];
	$controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
}
$controller = new $controller();
$controller->$action();
	