<?php

/** @var array $genres */
/** @var array $config */
/** @var object $config */
require_once "./app.php";
require_once "./lib/dbConnectFunction.php";
require_once "./lib/db-functions.php";
require_once "./lib/helper-function.php";
require_once "./lib/template-functions.php";
$database=connectDataBase($config);
if (isset($_GET['id']))
{
	$movies=getMovieInfo($database, $_GET['id']);

}
$moviesListPage=renderTemplate("./resource/pages/about-movie.php", [
	'movies' => $movies
]);


renderLayout($moviesListPage, [
	'genres' => getGenres($database),
	'config'=>$config
]);
