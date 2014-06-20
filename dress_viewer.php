<?php
include 'db_connect.php';

$result = mysql_query("SELECT * FROM dresses");

while ($row = mysql_fetch_array($result)) {
     $path = $row{'dress_name'}.".png";
     echo "<img src = 'dresses/$path'/><br>";
}

mysql_close($dbhandle);
?>
