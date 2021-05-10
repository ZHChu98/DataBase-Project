<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$user_id = $_COOKIE["user"];
$sql1 = "SELECT rmsect_id, DATE_FORMAT(rmsect_dt, '%Y-%m-%d') rmsect_dt, rmsect_ts, rmsect_rmncap, rm_id FROM ydzc_rmsect WHERE rmsect_dt>NOW() ORDER BY rmsect_id";
$sql2 = "SELECT * FROM ydzc_rm ORDER BY rm_id";
$result1 = mysqli_query($connection, $sql1);
$result2 = mysqli_query($connection, $sql2);
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
      <form action="cust-room-reserve.php" method="post">
        <table class="table table-striped">
          <?php
          # head
          echo "<tr><td>Time Slot</td>";
          $rm_num = mysqli_num_rows($result2);
          while($row2 = mysqli_fetch_assoc($result2)) {
            echo "<td>{$row2['rm_id']}</td>";
          }
          echo "</tr>";
          # content
          $row1 = mysqli_fetch_assoc($result1);
          while ($row1) {
            echo "<tr><td>{$row1["rmsect_dt"]} {$row1["rmsect_ts"]}</td>";
            $i = 0;
            do {
              if ($row1['rmsect_rmncap'] > 0) {
                echo "<td><button type='submit' class='btn' name='rmsect_id' value='{$row1['rmsect_id']}' style='background-color: transparent;'>{$row1['rmsect_rmncap']}</button></td>";
              } else {
                echo "<td>0</td>";
              }
              $row1 = mysqli_fetch_assoc($result1);
              $i++;
            } while ($i < $rm_num);
            echo "</tr>";
          }
          ?>
        </table>
      </form>
    </div>
  </div>

</body>
</html>
