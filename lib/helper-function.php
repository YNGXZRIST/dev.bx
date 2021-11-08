<?php
require_once "./resource/db/movies.php";

function getMovieTitle(array $movies, int $id): string
{
	if (isset($movies))
	{
		foreach ($movies as $movie)
		{
			if ($movie["id"] == $id)
			{
				return $movie['title'];
			}
		}
	}
	return "add movies to array";
}

function getAndCutMovieDescription(array $movies, int $id): string
{
	if (isset($movies))
	{
		foreach ($movies as $movie)
		{
			if ($movie["id"] == $id)
			{
				$movie["description"] = mb_strimwidth($movie['description'], 0, 100, "...");

				return $movie['description'];
			}
		}
	}
	return "add movies to array";
}

function getMovieGenres(array $movies, int $id): string
{
	if (isset($movies))
	{
		foreach ($movies as $movie)
		{
			if ($movie["id"] == $id)
			{
				$str = implode(",", $movie['genres']);
				$str = mb_strimwidth($str, 0, 30, "...");

				return $str;
			}
		}
	}
	return "add movies to array";
}

function formatMovieDuration(array $movies, int $id): string
{
	if (isset($movies))
	{
		foreach ($movies as $movie)
		{
			if ($movie["id"] == $id)
			{
				$hours = (string)date('G:i', mktime(0, $movie['duration']));
				$minutes = (string)$movie['duration'];
				return "$minutes" . " мин. / " . "$hours";
			}
		}
	}
	return "add movies to array";
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
function getMovieById(array $movies,int $id){

		return array_filter($movies, function($movie) use ($id){
			return $movie['id'] === $id;
		});

}

function getMovieAgeRestriction(array $movie) : string{
	if (isset($movie)){
		return $movie['age-restriction'] ."+";
	}
}
function getMovieActors(array $movie): string
{
	if (isset($movie))
	{
			$str = implode(",", $movie['cast']);
			return $str;
	}
	return "add movies to array";
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