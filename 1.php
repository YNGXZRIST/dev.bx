<?php
require_once "./lib/dbConnectFunction.php";
require_once "./lib/db-functions.php";
require_once "./lib/template-functions.php";
function getGenres1():array{
	global $database;
	$query = "SELECT CODE,NAME FROM genre group by CODE, NAME";

	$result = mysqli_query($database, $query);
	if (!$result)
	{
		trigger_error($database->error, E_USER_ERROR);
	}

	return mysqli_fetch_all ($result, MYSQLI_ASSOC);
}
function getMovies1(){
	global $database;
	$query = "SELECT m.ID,
       m.TITLE,
       m.ORIGINAL_TITLE,
       m.DESCRIPTION,
       m.duration,
       m.AGE_RESTRICTION,
       m.RELEASE_DATE,
       m.RATING,
       (select name from director where director.ID=DIRECTOR_ID)
       FROM movie m";
	$result = mysqli_query($database, $query);
	if (!$result)
	{
		trigger_error($database->error, E_USER_ERROR);
	}

	return mysqli_fetch_all ($result, MYSQLI_ASSOC);

}

function getFilmsByGenre1(array $movies, string $genres)
{
	if (isset($movies)){
		return array_filter($movies, function($movie) use ($genres){
			if (strpos($movie['GENRES'], $genres))
				return $movie['ID'];
		});
	}
	return "movie by genre not found";
}
function getFilmsByGenre(array $movies, string $genres)
{
	if (isset($movies)){
		return array_filter($movies, function($movie) use ($genres){
			if (strstr($movie['GENRES'], $genres))
				return $movie['ID'];
		});
	}
	return "movie by genre not found";
}

$genre="Фантастика";
$movies=getMovies();
var_dump(getFilmsByGenre($movies,$genre));