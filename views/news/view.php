

<!-- views/news/view.php -->

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="/tamplate/css/style.css" rel="stylesheet" type="text/css">

<!-- запись в заголовке -->
<title> <?php echo $newsItem['title']; ?> </title>
</head>
<body>

<!--Обертка-->
<div id="wrap">

<!--Шапка-->
<div class="head">
<h1>НОВОСТИ</h1>
</div>

<!--Контент-->
<div id="content">
<div class="post-news">

<!-- заголовок новости -->
<h2 class="title"> <?php echo $newsItem['title']; ?> </h2>

<!-- автор новости и дата добавления -->
<p class="byline"> <?php echo $newsItem['author_name'];   echo $newsItem['date']; ?> </p>

<!-- полное содержание новости -->
<div class="entry">
<p> <?php echo $newsItem['content']; ?> </p>
</div>

<!-- ссылка к списку новостей -->
<div class="meta">
<p class="links"><a href="/news/" class="comments"> Назад к списку новостей </a></p>
</div>
</div>
</div>

<!-- footer -->
<div id="footer">
</div>
</div>
</body>
</html>