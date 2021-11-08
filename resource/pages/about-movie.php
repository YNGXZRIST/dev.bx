<?php
/** @var array $movies */


?>

<?php
foreach ($movies as $movie): ?>
	<?= renderTemplate("./resource/blocks/_about-movie.php", [
		'movies' => $movies,
		'movie' => $movie
	])?>
<?php
endforeach; ?>