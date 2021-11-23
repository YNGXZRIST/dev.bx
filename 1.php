<?php
require_once ("./lib/dbConnectFunction.php");
function getMovies1(mysqli $database){

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

	return mysqli_fetch_array ($result, MYSQLI_ASSOC);

}

$conn=connectDataBase();
var_dump(getMovies1($conn));