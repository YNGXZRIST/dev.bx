<?php
require_once "dbConnectFunction.php";

function getGenres($database)
{
	global $database;
	$query = "SELECT CODE,NAME FROM genre group by CODE, NAME";

	$result = $database->query($query);
	if (!$result)
	{
		trigger_error($database->error, E_USER_ERROR);
	}

	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getMovies(mysqli $database)
{
	$query = "SELECT m.ID,
       m.TITLE,
       m.ORIGINAL_TITLE,
       m.DESCRIPTION,
       m.duration,
       m.AGE_RESTRICTION,
       m.RELEASE_DATE,
       m.RATING,
       (SELECT  GROUP_CONCAT(name) as name FROM genre
inner join movie_genre mg on genre.ID = mg.GENRE_ID where MOVIE_ID=m.id) as GENRES,
       (select name  from director where director.ID=DIRECTOR_ID ) as DIRECTOR,
       (SELECT  GROUP_CONCAT(name) as CAST FROM actor
	    inner join movie_actor ma on actor.ID = ma.ACTOR_ID where MOVIE_ID=m.id) as CAST
       FROM movie m
";

	$result = $database->query($query);
	if (!$result)
	{
		trigger_error($database->error, E_USER_ERROR);
	}

	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getMovieByGenre(mysqli $database, string $genre)
{
	if (isset($genre))
	{
		$query = "
SELECT m.ID,
       m.TITLE,
       m.ORIGINAL_TITLE,
       m.DESCRIPTION,
       m.duration,
       m.AGE_RESTRICTION,
       m.RELEASE_DATE,
       m.RATING,
       (SELECT  GROUP_CONCAT(name) as name FROM genre
	    inner join movie_genre mg on genre.ID = mg.GENRE_ID WHERE mg.MOVIE_ID =m.ID
       ) as GENRES,
       (select name  from director where director.ID=DIRECTOR_ID ) as DIRECTOR,
       (SELECT  GROUP_CONCAT(name) as CAST FROM actor
inner join movie_actor ma on actor.ID = ma.ACTOR_ID where MOVIE_ID=m.id and m.id=m.id) as CAST
FROM movie m having GENRES like '%$genre%'
";
		$result = $database->query($query);
		if (!$result)
		{
			trigger_error($database->error, E_USER_ERROR);
		}

		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}
}

function getMovieInfo(mysqli $database, string $id)
{
	$query = "
SELECT m.ID,
       m.TITLE,
       m.ORIGINAL_TITLE,
       m.DESCRIPTION,
       m.duration,
       m.AGE_RESTRICTION,
       m.RELEASE_DATE,
       m.RATING,
       (SELECT  GROUP_CONCAT(name) as name FROM genre
	     inner join movie_genre mg on genre.ID = mg.GENRE_ID WHERE mg.MOVIE_ID = $id) as GENRES,
       (select name  from director where director.ID=DIRECTOR_ID ) as DIRECTOR,
       (SELECT  GROUP_CONCAT(name) as CAST FROM actor
	                                                inner join movie_actor ma on actor.ID = ma.ACTOR_ID where MOVIE_ID=m.id and m.id=$id) as CAST
FROM movie m where m.ID=$id
";
	$result = $database->query($query);
	if (!$result)
	{
		trigger_error($database->error, E_USER_ERROR);
	}

	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

