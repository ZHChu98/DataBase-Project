<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$user_id = $_COOKIE["user"];
$sql = "SELECT rm_id, DATE_FORMAT(rmsect_dt, '%Y-%m-%d') rmsect_dt, rmsect_ts FROM ydzc_cust_rm_v WHERE cust_id=$user_id";
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
  <style type="text/css">td {text-align: center;}</style>
</head>

<body onload="checkCookie()">
  <header>
    <img src="../pictures/header-image.png" width=100% />
  </header>

  <div class="container">
    <div class="row">
      <ul class="nav nav-pills">
        <li><a href="cust-home.php">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="cust-book.php">Book<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="cust-book.php">Search</a></li>
            <li><a href="cust-book-rent.php">Rental</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="cust-event.php">Event<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="cust-event.php">Search</a></li>
            <li><a href="cust-event-reg.php">Registered</a></li>
          </ul>
        </li>
        <li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="cust-room.php">Study room<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="cust-room.php">Search</a></li>
            <li><a href="cust-room-resv.php">Reserved</a></li>
          </ul>
        </li>
        <li class="pull-right"><a href="../other/login.html">Logout</a></li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <table class="table table-striped">
        <tr><td>Room ID</td><td>Date</td><td>Time Slot</td></tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>{$row['rm_id']}</td>";
          echo "<td>{$row['rmsect_dt']}</td>";
          if ($row["rmsect_ts"] == "A") {
            echo "<td>8AM - 10AM</td>";
          } elseif ($row["rmsect_ts"] == "B") {
            echo "<td>11AM - 1PM</td>";
          } elseif ($row["rmsect_ts"] == "C") {
            echo "<td>1PM - 3PM</td>";
          } elseif ($row["rmsect_ts"] == "D") {
            echo "<td>4PM - 6PM</td>";
          }
          echo "</tr>";
        }
        ?>
      </table>
    </div>
  </div>

</body>
</html>
