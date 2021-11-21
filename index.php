<?php
declare(strict_types=1);
require_once "./lib/template-functions.php";
require_once "./lib/dbConnectFunction.php";
require_once "./lib/db-functions.php";
require_once "./lib/helper-function.php";
require_once "./app.php";
/** @var array $movies */
/** @var array $config */
if (isset($_GET['genre']))
{

	$movies=getFilmsByGenre(getMovies(), $_GET['genre']);
	$movieListPage = renderTemplate("./resource/pages/movie-list.php", [
		'movies' => $movies
	]);

	renderLayout($movieListPage,[
	'movies' => $movies,
	'genres'=> getGenres(),
	'currentPage'=>$_GET['genre'],
	'config'=>$config
]);
}
else{
	$movies=getMovies();
	$movieListPage = renderTemplate("./resource/pages/movie-list.php", [
		'movies' => $movies
	]);
	renderLayout($movieListPage,[
		'movies' => $movies,
		'genres'=>getGenres(),
		'currentPage'=>'index',
		'config'=>$config
	]);

}



