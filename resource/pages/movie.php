<?php

require_once "help-func.php";

/** @var array $movies */

?>
<div class="movie-list--item">

	<div class="movie-list--item-image" style="background-image: url(img/<?= $movie['id'] ?>.jpg)"></div>
	<div class="movie-list--item-head">
		<div class="movie-list--item-title"><?= cutTitle($movies, $movie['id']) ?></div>
		<div class="movie-list--item-subtitle"><?= $movie['original-title'] ?></div>
		<div class="movie-list--item-wrapper"></div>
		<div class="movie-list--item-description"><?= cutDescription(
				$movies,
				$movie['id']
			) ?></div>
		<div class="movie-list--item-bottom">
			<div class="movie-list--item-time">
				<div class="movie-list--item-time-icon"></div>
				<?= formatDuration($movies, $movie['id']) ?></div>
			<div class="movie-list--item-info"><?= cutGenres($movies, $movie['id']) ?></div>
		</div>
	</div>
</div>
