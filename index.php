<?php
function tt($a)
{
	echo '<pre>';
	var_dump($a);
	echo '</pre>';
}
// вывод ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);
// путь файла MVC
define('ROOT', dirname(__FILE__));

// подключаем файл Router.php
require_once (ROOT . '/componets/Router.php');

// - создаем экземпляр класса Router
$router = new Router();

// и запускаем метод run(), тем самым, передав на него управление
$router->run();
require_once (ROOT . '/views/news/index.php');

