<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$user_id = $_COOKIE["user_id"];
$sql = "SELECT * FROM ydzc_auth WHERE auth_id=$user_id";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Homepage </title>
  <link href="../bootstrap.min.css" rel="stylesheet">
  <link href="../bootstrap-table.min.css" rel="stylesheet">
  <script src="../bootstrap.min.js"></script>
  <script src="../jquery-3.6.0.min.js"></script>
  <script src="../bootstrap-table.min.js"></script>
</head>

<body>
  <header>
    <img src="../pictures/header-image.png" width=100% />
  </header>

  <div class="container">
    <div class="row">
      <ul class="nav nav-pills">
        <li class="active"><a href="auth-home.php">Home</a></li>
        <li><a href="auth-book.php">Book</a></li>
        <li><a href="auth-seminar.php">Seminar</a></li>
        <li class="pull-right"><a href="login.html">Logout</a></li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <table class="table table-striped">
        <?php
        $row = mysqli_fetch_assoc($result);
        echo "<tr><td>ID</td><td>{$row["auth_id"]}</td></tr>";
        echo "<tr><td>Name</td><td>{$row["auth_fname"]} {$row["auth_lname"]}</td></tr>";
        echo "<tr><td>Email</td><td>{$row["auth_email"]}</td></tr>";
        echo "<tr><td>Address</td><td>{$row["auth_hno"]} {$row["auth_st"]}, {$row["auth_city"]}, {$row["auth_state"]}</td></tr>";
        echo "<tr><td>Country</td><td>{$row["auth_country"]}</td></tr>";
        echo "<tr><td>ZipCode</td><td>{$row["auth_zip"]}</td></tr>";
        ?>
      </table>
      <a type="button" class="btn btn-primary" href="auth-profile.php">Edit</a>
    </div>
  </div>

</body>
</html>
