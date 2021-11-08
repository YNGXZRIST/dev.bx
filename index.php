<?php
declare(strict_types=1);
require_once "./lib/helper-function.php";
require_once "./lib/template-functions.php";
/** @var array $movies */
/** @var array $genres */
$movieListPage = renderTemplate("./resource/pages/movie-list.php", [
'movies' => $movies
]);

renderLayout($movieListPage,[
	'movies' => $movies,
	'genres'=>$genres
]);
