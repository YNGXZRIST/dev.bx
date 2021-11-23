<?php
declare(strict_types=1);
require_once "./lib/template-functions.php";
require_once "./lib/dbConnectFunction.php";
require_once "./lib/db-functions.php";
require_once "./lib/helper-function.php";
require_once "./app.php";
/** @var array $movies */
/** @var array $config */
/** @var object $database */
$database =connectDataBase();

	if (isset($_GET['genre']))
	{

		$movies=getMovieByGenre( $database, $_GET['genre']);
		$movieListPage = renderTemplate("./resource/pages/movie-list.php", [
			'movies' => $movies
		]);

		renderLayout($movieListPage,[
			'movies' => $movies,
			'genres'=> getGenres($database),
			'currentPage'=>$_GET['genre'],
			'config'=>$config
		]);
	}
	else{
		$movies=getMovies($database);
		$movieListPage = renderTemplate("./resource/pages/movie-list.php", [
			'movies' => $movies
		]);
		renderLayout($movieListPage,[
			'movies' => $movies,
			'genres'=>getGenres($database),
			'currentPage'=>'index',
			'config'=>$config
		]);

	}



