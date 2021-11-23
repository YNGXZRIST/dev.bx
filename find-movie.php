<?php
declare(strict_types=1);
require_once "./lib/template-functions.php";
require_once "./lib/dbConnectFunction.php";
require_once "./lib/db-functions.php";
require_once "./lib/helper-function.php";
require_once "./app.php";
$database=connectDataBase($config);
isset($_POST['title']);
trim($_POST['title']);
htmlspecialchars($_POST['title']);

if ($_SERVER['REQUEST_METHOD']==="POST"){
	$movies=(getMoviesByTitle(getMovies($database),$_POST['title']));
}
if ($movies===null){
	$movieListPage = renderTemplate("./resource/pages/errors-list.php");
}
$movieListPage = renderTemplate("./resource/pages/movie-list.php", [
	'movies' => $movies
]);

renderLayout($movieListPage,[
	'movies' => $movies,
	'genres'=>getGenres(),
	'config'=>$config

]);
