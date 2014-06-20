<?php
$username = "username";
$password = "password";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");

//selecting the database
$selected = mysql_select_db("darpan",$dbhandle)
  or die("Could not select darpan");

?>
