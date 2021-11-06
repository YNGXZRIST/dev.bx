<?php
require_once "../help-func.php";
require_once "../lib/template-function.php"

/** @var array $movies */

?>
<!doctype html>
<html lang="ru">
<link rel="stylesheet" href="../source/css/style.css">

<link rel="stylesheet" href="../source/css/reset.css">
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
			<p><img src="../source/image/BITFLIX.png" alt="BITFLIX"></p>
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
					<p><img src="../source/image/Search.png" alt="search"></p>
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
			<div class="movie-list">
				<?php
				foreach ($movies as $movie): ?>
					<div class="movie-list--item">

						<div class="movie-list--item-image" style="background-image: url(../source/image/<?= $movie['id'] ?>.jpg)"></div>
						<div class="movie-list--item-head">
							<div class="movie-list--item-title"><?= getMovieTitle($movies, $movie['id']) ?></div>
							<div class="movie-list--item-subtitle"><?= $movie['original-title'] ?></div>
							<div class="movie-list--item-wrapper"></div>
							<div class="movie-list--item-description"><?= getAndCutMovieDescription($movies, $movie['id']) ?></div>
							<div class="movie-list--item-bottom">
								<div class="movie-list--item-time">
									<div class="movie-list--item-time-icon"></div>
									<?= formatMovieDuration($movies, $movie['id']) ?></div>
								<div class="movie-list--item-info"><?= getMovieGenres($movies, $movie['id']) ?></div>
							</div>
						</div>
					</div>
				<?php
				endforeach; ?>
			</div>

		</div>
	</div>

</body>
</html>
