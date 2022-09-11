<?php
class Router
{
// массив маршрутов
	private $routes;

	public function __construct()
	{
		$routesPath = ROOT . '/config/routes.php';
		$this->routes = include($routesPath);
	}


// метод будет принимать управление от фронтконтроллера
	public function run()
	{
		$uri = $this->getURI();

	foreach ($this->routes as $uriPattern => $path) 
	{
		if(preg_match("~$uriPattern~", $uri))
		{
			/*
			$segments = explode('/', $path);
			$controllerName = array_shift($segments) . 'Controller';

		// делает первую букву строки заглавной
			$controllerName = ucfirst($controllerName);

		// выводим имя контроллера

			$actionName = 'action' . ucfirst(array_shift($segments));

			// выводим название экшена

			// Определяем путь к файлу, который нужно подключить (путь к файлу класса)
			$controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

			// затем проверяем: если такой файл существует, то подключаем его
			if(file_exists($controllerFile))
			{
				include_once ($controllerFile);
			}

			// создаем объект класса контроллера
			$controllerObject = new $controllerName;

			// для этого объекта мы вызываем метод
			$result = $controllerObject -> $actionName();
			
		
			if($result != null)
			{
				break;
			}
			*/
			$internalRoute = preg_replace("~$uriPattern~", $path, $uri);


			$segments = explode('/', $internalRoute);// $internalRoute вместо $path


			// получаем имя контроллера
			$controllerName = array_shift($segments) . 'Controller';
			$controllerName = ucfirst($controllerName);

			// получаем название экшена
			$actionName = 'action' . ucfirst(array_shift($segments));

			$parameters = $segments;

			$controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

			// проверяем: если такой файл существует, то подключаем его
			if(file_exists($controllerFile))
			{
				include_once ($controllerFile);
			}

			// создаем объект класса контроллера
			$controllerObject = new $controllerName;

			// $result = $controllerObject -> $actionName($parameters);
			$result = call_user_func_array(array($controllerObject, $actionName), $parameters );
			die;


		}

	}

	}
	private function getURI()
	{
		if(!empty($_SERVER['REQUEST_URI']))
		{
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

}
