<?php
require_once "app.php";
require_once "./lib/db-functions.php";
/** @var array $config */

$database = mysqli_init();
$connectionResult = mysqli_real_connect(
	$database,
	$host=$config['db']['host'],
	$username=$config['db']['username'],
	$password=$config['db']['password'],
	$dbName=$config['db']['dbName'],
);

if(!$connectionResult)
{
	$error = mysqli_connect_errno() . ": ". mysqli_connect_error();
	trigger_error($error, E_USER_ERROR);
}
$result = mysqli_set_charset($database, 'utf8');
if(!$result)
{
	trigger_error(mysqli_error($database), E_USER_ERROR);
}



