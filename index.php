<?php
declare(strict_types = 1);
require_once "./lib/template-functions.php";
require_once "./lib/dbConnectFunction.php";
require_once "./lib/db-functions.php";
require_once "./lib/helper-function.php";
require_once "./app.php";
/** @var array $movies */
/** @var array $config */
/** @var array $actors */
/** @var object $database */
$database = connectDataBase($config);
$genres = getGenres($database);
$actors = getActorsList($database);
if (isset($_GET['genre']))
{
	$movies = getMovieByGenre($database, $_GET['genre']);
	$movieListPage = renderTemplate("./resource/pages/movie-list.php", [
		'movies' => $movies,
		'genres' => $genres,

	]);

	renderLayout($movieListPage, [
		'movies' => $movies,
		'genres' => $genres,
		'currentPage' => $_GET['genre'],
		'config' => $config,

	]);
}
else
{
	$movies = getMovies($database);
	$movieListPage = renderTemplate("./resource/pages/movie-list.php", [
		'movies' => $movies,
		'genres' => $genres,
		'actors' => $actors,
	]);
	renderLayout($movieListPage, [
		'movies' => $movies,
		'genres' => $genres,
		'currentPage' => 'index',
		'config' => $config,
	]);
}


