<?php
// маршруты
return array
(
	'news/([0-9]+)' => 'news/view/$1', 
	'news' => 'news/index', // actionIndex в NewsController
	'products' => 'product/list' // actionList в ProductController

);
