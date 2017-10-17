<?php


//Conntect to the Database
function connect(){

$dbName = DBNAME;
$dbHost = DBHOST;
$dbUser = DBUSER;
$dbPass = DBPASS;

      $db = new PDO( "mysql:dbname=$dbName;host=$dbHost" , $dbUser , $dbPass );

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

      return $db;
}
