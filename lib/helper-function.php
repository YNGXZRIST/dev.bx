<?php
require_once "./resource/db/movies.php";



function CutMovieDescription(string $description): string
{
	if (isset($description))
	{

		$description = mb_strimwidth($description, 0, 200, "...");

				return $description;


	}
	return "description is empty";
}

function getMovieGenres(array $movie): string
{
	if (isset($movie))
	{

				$str = implode(",", $movie['genres']);
				$str = mb_strimwidth($str, 0, 30, "...");

				return $str;

	}
	return " genres not found";
}

function formatMovieDuration(string $duration): string
{
	if (isset($duration))
	{

				$hours = (string)date('G:i', mktime(0, $duration));
				$minutes = (string)$duration;
				return "$minutes" . " мин. / " . "$hours";

	}
	return "duration is empty";
}
function getFilmsByGenre(array $movies, string $genres)
{
	if (isset($movies)){
		return array_filter($movies, function($movie) use ($genres){
			if (in_array($genres, $movie['genres']))
				return $movie['id'];
		});
	}
}
function getMovieById(array $movies,string $id){

		return array_filter($movies, function($movie) use ($id){
			return $movie['id'] === $id;
		});
		return "movie not found";

}

function getMovieAgeRestriction(string $age_restriction) : string{
	if (isset($age_restriction)){
		return $age_restriction ."+";
	}
	return "age restriction is empty";
}
function getMovieActors(array $movie): string
{
	if (isset($movie))
	{
			$str = implode(",", $movie['cast']);
			return $str;
	}
	return "cast is empty";
}
function getMoviesByTitle(array $movies, string $title)
{
	if (isset($movies)){
		return array_filter($movies, function($movie) use ($title){
			if ($title===$movie['title'])
				return $movie;
		});
	}
}
function getFileName($path):string{
	return basename($path,);
}