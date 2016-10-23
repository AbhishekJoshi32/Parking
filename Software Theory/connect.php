<?php
$server = 'localhost';
$username   = 'Anushka';
$password   = 'Anushka';
$database   = 'software';
 
if(!mysql_connect($server, $username,  $password))
{
    die("Error: could not establish database connection");
}
if(!mysql_select_db($database))
{
    die("Error: could not select the database");
}
?>