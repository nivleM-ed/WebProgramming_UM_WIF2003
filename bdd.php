<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=calendar;charset=utf8', 'root', 'aina1998');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
