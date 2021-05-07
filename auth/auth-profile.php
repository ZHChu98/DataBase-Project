<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$user_id = $_COOKIE["user"];
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
  <script src="../jquery-3.6.0.min.js"></script>
  <script src="../bootstrap.min.js"></script>
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
        <li class="pull-right"><a href="../other/login.html">Logout</a></li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <form action="auth-profile-update.php" method="post">
        <table class="table table-striped">
          <?php
          $row = mysqli_fetch_assoc($result);
          echo "<tr><td>ID</td><td>{$row["auth_id"]}</td></tr>";
          echo "<tr><td>First Name</td><td><input type='text' name='fname' value='{$row["auth_fname"]}'></td></tr>";
          echo "<tr><td>Last Name</td><td><input type='text' name='lname' value='{$row["auth_lname"]}'></td></tr>";
          echo "<tr><td>Email</td><td><input type='text' name='email' value='{$row["auth_email"]}'></td></tr>";
          echo "<tr><td>House Number</td><td><input type='text' name='hno' value='{$row["auth_hno"]}'></td></tr>";
          echo "<tr><td>Street</td><td><input type='text' name='st' value='{$row["auth_st"]}'></td></tr>";
          echo "<tr><td>City</td><td><input type='text' name='city' value='{$row["auth_city"]}'></td></tr>";
          echo "<tr><td>State</td><td><input type='text' name='state' value='{$row["auth_state"]}'></td></tr>";
          echo "<tr><td>Country</td><td><input type='text' name='country' value='{$row["auth_country"]}'></td></tr>";
          echo "<tr><td>ZipCode</td><td><input type='text' name='zip' value='{$row["auth_zip"]}'></td></tr>";
          ?>
        </table>
        <div>
          <button type="submit" class="btn btn-primary">Save</button>
          <a type="button" class="btn btn-primary" href="auth-home.php">Back</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
