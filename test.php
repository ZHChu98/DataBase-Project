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
  $sql = "SELECT auth_id, auth_fname, auth_lname FROM ydzc_auth";
  $out = mysqli_query($connection, $sql);
  echo "<table>";
  echo "<td><tr>1</tr><tr>2</tr></td>";
  echo "</table>";
  mysqli_close($connection);
?>
</body>

</html>