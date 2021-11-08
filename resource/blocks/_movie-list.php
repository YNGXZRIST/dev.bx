<?php
require_once "./lib/helper-function.php";
/** @var array $movies */
?>
<div class="movie-list--item">

<div class="movie-list--item-overlay">
	<a href="movie-info.php?id=<?= $movie['id'] ?>" class="movie-list--item-more">Подробнее</a>
</div>
	<div class="movie-list--item-image" style="background-image: url(./resource/image/<?= $movie['id'] ?>.jpg)"></div>
	<div class="movie-list--item-head">
		<div class="movie-list--item-title"><?= getMovieTitle($movies, $movie['id']) ?></div>
		<div class="movie-list--item-subtitle"><?= $movie['original-title'] ?></div>
		<div class="movie-list--item-wrapper"></div>
		<div class="movie-list--item-description"><?= getAndCutMovieDescription(
				$movies,
				$movie['id']
			) ?></div>
		<div class="movie-list--item-bottom">
			<div class="movie-list--item-time">
				<div class="movie-list--item-time-icon">
					<img src="./resource/image/clock.png">
				</div>
				<?= formatMovieDuration($movies, $movie['id']) ?></div>
			<div class="movie-list--item-info"><?= getMovieGenres($movies, $movie['id']) ?></div>
		</div>
	</div>

</div>