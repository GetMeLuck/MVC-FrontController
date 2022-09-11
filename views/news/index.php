<!-- views/news/index.php -->

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="/tamplate/css/style.css" rel="stylesheet" type="text/css">
<title> Список новостей </title>
</head>
<body>

<!--Обертка-->
<div id="wrap">

<!--Шапка-->
<div class="head">
<h1>НОВОСТИ </h1>
</div>

<!--Контент-->
<div id="content">

<?php foreach ($newsList as $newsItem):?> <!-- цикл foreach -->

<div class="post">

<!-- ссылка на новость (по индификатору 'id') и заголовок новости -->
<h2 class="title">
<a href= "/news/<?php echo $newsItem['id'];?>" >
<?php echo $newsItem['title'] ; ?>
</a>
</h2>

<!-- дата добавления новости -->
<p class="byline"> <?php echo $newsItem['date']; ?> </p>

<!-- краткое содержание новости -->
<div class="entry">
<p>
<?php echo $newsItem['short_content']; ?>
</p>
</div>

<!-- ссылка на новость -->
<div class="meta">
<p class="links">
<a href= "/news/<?php echo $newsItem['id']; ?> " class="comments"> Читать дальше </a>
</p>

</div>
</div>

<?php endforeach; ?> <!-- конец цикла foreach -->

</div>

<!-- footer -->
<div id="footer">
</div>
</div>
</body>
</html>