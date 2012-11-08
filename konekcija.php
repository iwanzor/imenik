<?php
$hostname_connection = "localhost";
$database_connection = "proba";
$username_connection = "root";
$password_connection = "";
$connection = mysql_connect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
