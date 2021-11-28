<?php
//require_once "./resource/db/movies.php";



function CutMovieDescription(string $description): string
{
	if (isset($description))
	{

		$description = mb_strimwidth($description, 0, 200, "...");

				return $description;


	}
	return "description is empty";
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
			if (strstr($movie['GENRES'], $genres))
				return $movie['ID'];
		});
	}
	return "movie by genre not found";
}
function getMovieById(array $movies,string $id){

		return array_filter($movies, function($movie) use ($id){
			return strval($movie['ID']) === $id;
		});
		return "movie not found";

}

function getMovieAgeRestriction(string $age_restriction) : string{
	if (isset($age_restriction)){
		return $age_restriction ."+";
	}
	return "age restriction is empty";
}

function getMoviesByTitle(array $movies, string $title)
{
	if (isset($movies)){
		return array_filter($movies, function($movie) use ($title){
			if ($title===$movie['TITLE'])
				return $movie;
		});
	}
}
function getFileName($path):string{
	return basename($path,);
}
function getCurrentGenrePage (string $genre){
	if (isset($genre)){
		$currentGenrePage="index.php?genre=".$genre;
		return $currentGenrePage;
	}
	return "genre is empty";
}
function formatMovieGenres(array $movie){
	$genres=implode(',', array_column($movie, 'NAME'));
	$genres = mb_strimwidth($genres, 0, 30, "...");
	return $genres;

}
function formatMovieActors(array $movie):string{

	$actors=implode(',', array_column($movie, 'name'));

	return $actors;

}