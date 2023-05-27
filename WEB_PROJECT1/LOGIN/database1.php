<?php
$host="localhost";
$dbname="database";
$username="root";


$mySQL= new mysqli($host,$username,"",$dbname);

if($mySQL->connect_error)
{
    die("Connect error: ".$mySQL->connect_error);
}

return $mySQL;
?>