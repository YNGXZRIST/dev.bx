<?php

require "movies.php";

$age = readline("enter your age: ");

if (is_numeric($age) && $age >= 0)
{
	findMoviesByUserAge($movies, $age);
}
else
{
	echo "enter correct age";
}
function findMoviesByUserAge(array $movies, int $age): void
{
	$i = 1;

	foreach ($movies as $movie)
	{
		if ($movie['age_restriction'] <= $age)
		{
			echo "{$i} . {$movie['title']}  ({$movie['release_year']}), {$movie['age_restriction']}+. Rating- {$movie['rating']}"
				. "\n";
			$i++;

		}
	}
}


