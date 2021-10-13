<?php
require "movies.php";
echo "inter your age: ";

$age=readline("inter your age: ");
	switch ($age)
	{

	case ($age===0):
			findFilm($movies,$age);
			break;
		case($age>0 && $age<12):
			findFilm($movies,$age);
		break;
		case($age>0 && $age<=14):
			findFilm($movies,$age);
			break;
		case($age>0 && $age<=16):
			findFilm($movies,$age);
			break;
		case($age>0 && $age>=18):
			findFilm($movies,$age);
			break;
		default:
			echo "Enter currect age!";
	}
function findFilm(array $movies,int $age): void
{
	$i=1;
foreach ($movies as $movie){
	if ($movie['age_restriction']<=$age){
		echo "{$i} . {$movie['title']}  ({$movie['release_year']}), {$movie['age_restriction']}+. Rating- {$movie['rating']}" ."\n";
		$i++;
	}
}
}


