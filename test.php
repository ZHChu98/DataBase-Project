<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>

<body>
<?php
  $connection = mysqli_connect("localhost", "root", "");
  mysqli_select_db($connection, "project");
  if (!$connection) {
    die('Could not connect: ' . mysqli_error());}
  else {
    echo "hello world";
  }
  $expire=time()+60*60*24*30;
  setcookie("A1", "10010", $expire);
?>
</body>

</html>