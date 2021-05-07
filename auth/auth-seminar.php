<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$user_id = $_COOKIE["user_id"];
$sql = "SELECT evt_name, evt_startdt, evt_stopdt, invt_id FROM ydzc_auth_sem_v WHERE auth_id=$user_id";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Seminar </title>
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
        <li><a href="auth-home.php">Home</a></li>
        <li><a href="auth-book.php">Book</a></li>
        <li class="active"><a href="auth-seminar.php">Seminar</a></li>
        <li class="pull-right"><a href="login.html">Logout</a></li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <table class="table table-striped">
        <?php
        echo "<tr><td>Event Name</td><td>Start DateTime</td><td>End DateTime</td><td>Invitation ID</td></tr>";
        while ($row=mysqli_fetch_assoc($result)) {
          echo "<tr><td>{$row["evt_name"]}</td><td>{$row["evt_startdt"]}</td><td>{$row["evt_stopdt"]}</td><td>{$row["invt_id"]}</td></tr>";
        }
        ?>
      </table>
    </div>
  </div>

</body>
</html>
