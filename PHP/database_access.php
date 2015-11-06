<?php
// Enable to connect to the database
// replace localhost if different in your environment
// dbname: name of the database in PHPMyAdmin
// root: username
// password to set of not null

$user = 'root';
$password = '';

try
{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] =  "SET NAMES utf8";
	$bdd = new PDO('mysql:host=localhost;dbname=eurobookmaker', $user, $password, $pdo_options);
	
}
catch (Exception $e)
{
        die('Error : ' . $e->getMessage());
		echo $e->getMessage();
}
?>
