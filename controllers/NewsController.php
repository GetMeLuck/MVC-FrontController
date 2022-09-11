<?php
include_once ROOT . '/models/News.php';
class NewsController
{
	public function actionIndex()
	{
		$newsList = array();
		$newsList = News::getNewsList();
		include_once (ROOT . '/views/news/index.php');
		// return true;
	}

	public function actionView($id)
	{

		if ($id)
		{
			// обращение к статическому методу модели
			$newsItem= News::getNewsItemById($id);

			include_once (ROOT . '/views/news/view.php');

			// echo 'actionView';
		}
		return true;
	}

}
