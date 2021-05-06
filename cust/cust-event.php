<?php
  $method = $_POST["search-method"];
  $keyword = $_POST["search-info"];
  $connection = mysqli_connect("localhost", "root", "");
  if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
  mysqli_select_db($connection, "project");
  $sql = "SELECT evt_name, evt_type FROM ydzc_evt WHERE evt_type='$keyword'";
  $result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Search Result </title>
</head>

<body>
  <table>
    <?php
    echo "<tr><td>Name</td><td>Type</td></tr>";
    while ($row=mysqli_fetch_assoc($result)) {
      echo "<tr><td>{$row["evt_name"]}</td><td>{$row["evt_type"]}</td></tr>";
    }
    ?>
  </table>
</body>
</html>
