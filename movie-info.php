<?php

/** @var array $genres */
require_once "./app.php";
require_once "./lib/dbConnectFunction.php";
require_once "./lib/db-functions.php";
require_once "./lib/helper-function.php";
require_once "./lib/template-functions.php";

if (isset($_GET['id']))
{
	$movies=getMovieById(getMovies(), $_GET['id']);

}
$moviesListPage=renderTemplate("./resource/pages/about-movie.php", [
	'movies' => $movies
]);


renderLayout($moviesListPage, [
	'genres' => getGenres(),
	'config'=>$config
]);
