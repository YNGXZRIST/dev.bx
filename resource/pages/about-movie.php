<?php
/** @var array $movies */


?>

<?php
foreach ($movies as $movie): ?>
	<?php $movie['CAST']=getMovieActors($actors,$movie['CAST']);?>



	<?= renderTemplate("./resource/blocks/_about-movie.php", [
		'movies' => $movies,
		'movie' => $movie
	])?>
<?php
endforeach; ?>