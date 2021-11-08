<?php

/** @var array $movies */
/** @var string $content */
require_once "./resources/db/movies.php";
require_once "./lib/helper-function.php";

?>

<!doctype html>
<html lang="ru">
<link rel="stylesheet" href="./resource/css/style.css">
<link rel="stylesheet" href="./resource/css/reset.css">
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
			<p><img src="./resource/image/BITFLIX.png" alt="BITFLIX"></p>
		</div>
		<ul class="menu">
			<li class="menu-item">
				<a href="index.php">Главная</a>
			</li>
			<?php
			foreach ($genres as $genre): ?>
				<li class="menu-item">
					<a href="genre-list.php?genre=<?= $genre ?>"><?= $genre ?></a>
				</li>
			<?php
			endforeach; ?>
			<li class="menu-item">
				<a href="#link5">Мой список</a>
			</li>
		</ul>
	</div>
	<div class="container">
		<div class="header">
			<div class="search">
				<div class="loupe">
					<p><img src="./resource/image/Search.png" alt="search"></p>
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
			<?= $content ?>


		</div>
	</div>
</div>

</body>
</html>