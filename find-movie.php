<?php
declare(strict_types=1);
require_once "./lib/helper-function.php";
require_once "./lib/template-functions.php";
/** @var array $movies */
/** @var array $genres */
isset($_POST['title']);
trim($_POST['title']);
htmlspecialchars($_POST['title']);
var_dump($_POST['title']);
if ($_SERVER['REQUEST_METHOD']==="POST"){
	$movies=(getMoviesByTitle($movies,$_POST['title']));
}
if ($movies==null){
	$movieListPage = renderTemplate("./resource/pages/errors-list.php");
}
$movieListPage = renderTemplate("./resource/pages/movie-list.php", [
	'movies' => $movies
]);

renderLayout($movieListPage,[
	'movies' => $movies,
	'genres'=>$genres
]);
