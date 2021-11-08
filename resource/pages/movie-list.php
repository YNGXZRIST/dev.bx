<?php
require_once "./lib/helper-function.php";
/** @var array $movies */
?>
<div class="movie-list">
	<?php
	foreach (
		$movies

		as $movie
	): ?>

		<?= renderTemplate("./resource/blocks/_movie-list.php", [
			'movies' => $movies,
			'movie' => $movie,
		]); ?>
	<?php
	endforeach; ?>
</div>
