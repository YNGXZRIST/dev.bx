<?php
require_once "./lib/helper-function.php";
/** @var array $movies */
/** @var array $genres */
/** @var array $actors */

?>
<div class="movie-list">
	<?php
	foreach ($movies as $movie): ?>

<?php $movie['GENRES']=getMovieGenres($genres,$movie['GENRES']);?>

		<?= renderTemplate("./resource/blocks/_movie-list.php", [


			'movie' => $movie,
		]); ?>
	<?php
	endforeach; ?>
</div>
