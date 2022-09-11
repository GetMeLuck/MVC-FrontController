<?php
// МОДЕЛЬ
require_once(ROOT . '/componets/Db.php');
class News
{

// этод метод возвращает одну новость по индификатору в запросе ($id)
	public static function getNewsItemById($id)
	{
		require_once(ROOT . '/componets/Db.php');
		$id = intval($id);
		if ($id)
		{
			// $host = 'localhost';
			// $dbname = 'test2';
			// $user = 'root';
			// $password = '';

			// // Создаем объект класса PDO, передав в конструктор параметры соединения
			// // при помощи этого объекта ($db), мы будем общаться с БД
			// $db = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);

			$db = Db::getConnection();
			$result = $db->query('SELECT * FROM news WHERE id=' . $id);



			// Чтобы данные из базы данных не дублировались,
			// (ключами в массиве являются и названия колонок, и позиция колонок),
			// используем специальную константу:
			// ::setFetchMode —
			// - устанавливает режим выборки по умолчанию для объекта запроса

			// $result->setFetchMode(PDO::FETCH_NUM); -
			// - оставит идексы номеров колонок

			$result->setFetchMode(PDO::FETCH_ASSOC);
			// - оставит индексы в виде названий
			$newsItem = $result->fetch();
			return $newsItem;
		}
	}


// этод метод возвращает список новостей
	public static function getNewsList()
	{
// получаем объект класса PDO из класса Db

		$db = Db::getConnection();
		// После этого, создаем пустой массив для результатов
		$newsList = array();

		// описываем нужный запрос к базе данных
		// (Выбрать 10 последних новостей из таблицы "новости")
		$result = $db->query('SELECT id, title, date, short_content FROM news ORDER BY date DESC LIMIT 4');


		// В цикле обращаемся к методу fetch() объекта в переменной $result
		// при этом в цикле мы будем получать доступ к переменной $row,
		// которая символизирует строку из БД
		// (При работе с PDO - используется Объектно-Ориентированный Подход)
		// В цикле мы записываем необходимые полученные данные в массив результата
		// и далее, возвращаем этот массив: return $newsList

		$i = 0;
		while ($row = $result->fetch())
		{
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['date'] = $row['date'];
			$newsList[$i]['short_content'] = $row['short_content'];
			$i++ ;
		}
		return $newsList ;
		}
}
?>