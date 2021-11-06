<?php
require_once "../../lib/help-func.php";
/** @var array $movies */
?>
<div class="movie-list">
	<?php
	foreach (
		$movies

		as $movie
	): ?>

		<?= renderTemplate("../blocks/_movie-list.php", [
			'movies' => $movies,
			'movie' => $movie,
		]); ?>
	<?php
	endforeach; ?>
</div>
