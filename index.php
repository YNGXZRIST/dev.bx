<?php
declare(strict_types=1);
require_once "./lib/helper-function.php";
require_once "./lib/template-functions.php";
require_once "./app.php";
/** @var array $movies */
/** @var array $config */
/** @var array $genres */
if (isset($_GET['genre']))
{
	$movies=getFilmsByGenre($movies, $_GET['genre']);
	$movieListPage = renderTemplate("./resource/pages/movie-list.php", [
		'movies' => $movies
	]);
}

$movieListPage = renderTemplate("./resource/pages/movie-list.php", [
'movies' => $movies
]);

renderLayout($movieListPage,[
	'movies' => $movies,
	'genres'=>$genres,
	'currentPage'=>'index',
	'config'=>$config
]);
