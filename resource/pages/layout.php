<?php

/** @var array $movies */
/** @var string $content */
require_once "../db/movies.php";
require_once "../../lib/help-func.php";

?>
<!doctype html>
<html lang="ru">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/reset.css">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<div class="wrapper">
	<div class="sidebar">
		<div class="logo">
			<p><img src="../image/BITFLIX.png" alt="BITFLIX"></p>
		</div>

		<div class="menu">
			<li class="menu-item">
				<a href="#link1">Главная</a>
			</li>
			<li class="menu-item">
				<a href="#link2"> Сериалы</a>
			</li>
			<li class="menu-item">
				<a href="#link3">Фильмы</a>
			</li>
			<li class="menu-item">
				<a href="#link4"> Новинки и популярное</a>
			</li>
			<li class="menu-item">
				<a href="#link5">Мой список</a>
			</li>
		</div>
	</div>
	<div class="container">
		<div class="header">
			<div class="search">
				<div class="loupe">
					<p><img src="../image/Search.png" alt="search"></p>
				</div>
				<p><input name="catalog search" placeholder="Поиск по каталогу..."></p>

			</div>
			<div class="header-button">
				<form action="#link6" target="_blank">
					<button id="SearchButton">Искать</button>
				</form>
				<form action="#link7" target="_blank">
					<button id="AddMovie">Добавить фильм</button>
				</form>
			</div>


		</div>
		<div class="content">
						<?=$content; ?>



		</div>

</body>
</html>
