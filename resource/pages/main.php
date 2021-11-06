<?php
declare(strict_types=1);
require_once "../../lib/help-func.php";
require_once "../../lib/template-functions.php";
/** @var array $movies */
$movieListPage = renderTemplate("../pages/movie-list.php", [
'movies' => $movies
]);

renderLayout($movieListPage,[
	'movies' => $movies
]);
