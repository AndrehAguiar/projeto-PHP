<?php

$servername = "localhost";
$username = "5TIG";
$password = "testehost";
$dbname = "ver_duvida";

try {
    	$connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password
    	);

    	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
catch(PDOException $e)

    {
    	die("Lamento, algo não está funcionando 100% (DB) ");
    }

?>