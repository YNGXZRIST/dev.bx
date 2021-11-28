<?php
require_once "dbConnectFunction.php";

function getGenres($database)
{

	$query = "SELECT CODE,NAME FROM genre";

	$result = $database->query($query);
	if (!$result)
	{
		trigger_error($database->error, E_USER_ERROR);
	}

	$genres= mysqli_fetch_all($result, MYSQLI_ASSOC);
	$genres = array_combine(array_keys(array_fill(1, count($genres), 0)), array_values($genres));
	return $genres;
}
function getActorsList($database)
{

	$query = "SELECT id, name FROM actor";

	$result = $database->query($query);
	if (!$result)
	{
		trigger_error($database->error, E_USER_ERROR);
	}

	$actors= mysqli_fetch_all($result, MYSQLI_ASSOC);
	$actors = array_combine(array_keys(array_fill(1, count($actors), 0)), array_values($actors));
	return $actors;
}

function getMovies(mysqli $database,string $genre=null)
{

	$query = "SELECT m.ID,
       m.TITLE,
       m.ORIGINAL_TITLE,
       m.DESCRIPTION,
       m.duration,
       m.AGE_RESTRICTION,
       m.RELEASE_DATE,
       m.RATING,
    (select name  from director where director.ID=DIRECTOR_ID ) as DIRECTOR,
       (select GROUP_CONCAT(mg.GENRE_ID) from movie_genre mg where mg.MOVIE_ID = m.ID) as GENRES,
       (select GROUP_CONCAT(ma.ACTOR_ID) from movie_actor ma where m.ID = ma.MOVIE_ID)as  CAST
FROM movie m
";

	$result = $database->query($query);
	if (!$result)
	{
		trigger_error($database->error, E_USER_ERROR);
	}

	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function getMovieGenres(array $genres, string $name) : array
{
	$name = explode(',', $name);
	return array_map(function($key) use($genres) {
		return $genres[$key];
	}, $name);
}
function getMovieActors(array $actors, string $listOfActors) : array
{
	$listOfActors = explode(',', $listOfActors);
	return array_map(function($key) use($actors) {
		return $actors[$key];
	}, $listOfActors);
}

function getMovieByGenre(mysqli $database, string $genre)
{
	if (isset($genre))
	{
		$genre=mysqli_escape_string($database,$genre);
		$query = "
SELECT m.ID,
       m.TITLE,
       m.ORIGINAL_TITLE,
       m.DESCRIPTION,
       m.duration,
       m.AGE_RESTRICTION,
       m.RELEASE_DATE,
       m.RATING,
    (select name  from director where director.ID=DIRECTOR_ID ) as DIRECTOR,
       (select GROUP_CONCAT(mg.GENRE_ID) from movie_genre mg where mg.MOVIE_ID = m.ID) as GENRES,
       (select GROUP_CONCAT(ma.ACTOR_ID) from movie_actor ma where m.ID = ma.MOVIE_ID)as  CAST
FROM movie m
INNER JOIN movie_genre m_g on m.ID = m_g.MOVIE_ID
INNER JOIN genre g on m_g.GENRE_ID = g.ID AND g.NAME = '$genre'
";
		$result = $database->query($query);
		if (!$result)
		{
			trigger_error($database->error, E_USER_ERROR);
		}

		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}
	return "Жанр не выбран";
}

function getMovieInfo(mysqli $database, string $id)
{
	if (isset($id)){
$id=mysqli_escape_string($database,$id);
$query = "
SELECT m.ID,
       m.TITLE,
       m.ORIGINAL_TITLE,
       m.DESCRIPTION,
       m.duration,
       m.AGE_RESTRICTION,
       m.RELEASE_DATE,
       m.RATING,
    (select name  from director where director.ID=DIRECTOR_ID ) as DIRECTOR,
       (select GROUP_CONCAT(mg.GENRE_ID) from movie_genre mg where mg.MOVIE_ID = m.ID) as GENRES,
       (select GROUP_CONCAT(ma.ACTOR_ID) from movie_actor ma where m.ID = ma.MOVIE_ID)as  CAST
	    
FROM movie m where m.ID=$id
";
		$result = $database->query($query);
		if (!$result)
		{
			trigger_error($database->error, E_USER_ERROR);
		}

		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}
	return "Фильм не выбран";
}

