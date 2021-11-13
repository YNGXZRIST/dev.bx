<?php
/** @var array $movies */
/** @var array $genres */
require_once "./app.php";
require_once "./resource/db/movies.php";
require_once "./lib/helper-function.php";
require_once "./lib/template-functions.php";

if (isset($_GET['id']))
{
	$movies=getMovieById($movies, $_GET['id']);

}
$moviesListPage=renderTemplate("./resource/pages/about-movie.php", [
	'movies' => $movies
]);


renderLayout($moviesListPage, [
	'genres' => $genres,
	'config'=>$config
]);
