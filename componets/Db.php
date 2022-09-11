<?php 
class Db
{
	public static function getConnection()
	{
		$paramsPath = ROOT . '/config/db_params.php';
		$params = include($paramsPath);
		// $host = 'localhost';
		// $dbname = 'test2';
		// $user = 'root';
		// $password = '';

		$dsn = "mysql:host={$params['host']}; dbname={$params['dbname']}";
		$db = new PDO($dsn , $params['user'], $params['password']);

		return $db;
	}
}