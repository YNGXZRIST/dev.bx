<?php

/** @var array $movies */
/** @var string $content */
/** @var string $currentMenuItem */
require_once "./resource/db/movies.php";
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


				<?php
				if ($currentPage === "index"): ?>
			<li class="menu-item">
				<a href="index.php" class="menu-item--active">Главная</a>
			</li>
			<?php
			else: ?>
			<li class="menu-item">
				<a href="index.php">Главная</a>
			</li>
			<?php
			endif; ?>
			<?php foreach ($genres as $genre): ?>
				<?php
				if ($_GET['genre'] === $genre) : ?>
					<li class="menu-item">
						<a href="index.php?genre=<?= $genre ?>" class="menu-item--active">
							<?= $genre ?>
						</a>
					</li>
				<?
				else: ?>

					<li class="menu-item">
						<a href="index.php?genre=<?= $genre ?>"><?= $genre ?></a>
					</li>
				<?php
				endif; ?>
			<?php
			endforeach; ?>

			<?php
				if ($currentPage === "in_work"): ?>
				<li class=" menu-item">
				<a href="index.php" class="menu-item--active">ИЗБРАННОЕ</a>
			</li>
			<?php
			else: ?>
			<li class="menu-item">
				<a href="./process-page.php">ИЗБРАННОЕ</a>
			</li>
			<?php
			endif; ?>
		</ul>
	</div>
	<div class="container">
		<div class="header">
			<div class="search">
				<form action="./find-movie.php" method="post" style="display: inline-flex;  align-items: center;">
					<div class="loupe">
						<img src="./resource/image/Search.png" alt="search">

					</div>
					<p><input name="title" placeholder="Поиск по каталогу..."></p>

			</div>
			<div class="header-button">

				<button id="SearchButton">Искать</button>

				<a href="process-page.php" class="AddMovie-button">ДОБАВИТЬ ФИЛЬМ</a>
			</div>


		</div>
		<div class="content">
			<?= $content ?>
		</div>
	</div>
</div>

</body>
</html>