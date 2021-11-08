<?php
/** @var array $movies */
/** @var array $genres */
require_once "./lib/helper-function.php";
require_once "./lib/template-functions.php";
if (isset($_GET['genre']))
{
	$movies=getFilmsByGenre($movies, $_GET['genre']);
}
$moviesListPage=renderTemplate("./resource/pages/movie-list.php", [
	'movies' => $movies
]);


renderLayout($moviesListPage, [
	'genres' => $genres
]);