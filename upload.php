<?php

include 'db_connect.php';
$uploaddir = '/var/www/html/';

if (!$_POST['dress_name'] || !$_POST['category'])
{
die('Please complete the form');
}

$dress_name = $_POST['dress_name'];
$dress_category = $_POST['category'];

$sql="INSERT INTO dresses (dress_name, dress_category)
VALUES ('$dress_name', '$dress_category')";

if (!mysql_query($sql)) {
  die('Error: ' . mysql_error($dbhandle));
}
echo "record added";

mysql_close($dbhandle);

 if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  }
  else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
   
    if (file_exists($uploaddir . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    }
    else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $uploaddir . $_FILES["file"]["name"]);
      echo " and file has been Uploaded to: " . $uploaddir;
    }
  }

?> 
