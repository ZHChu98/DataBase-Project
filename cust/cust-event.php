<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
if (isset($_POST["search-meth"]) && isset($_POST["search-info"])) {
  $method = $_POST["search-meth"];
  $keyword = $_POST["search-info"];
  $user_id = $_COOKIE["user"];

  $sql = "SELECT DISTINCT evt_id, evt_name, evt_id, DATE_FORMAT(evt_startdt, '%Y-%m-%d') evt_startdt, DATE_FORMAT(evt_stopdt, '%Y-%m-%d') evt_stopdt, top_name FROM ydzc_cust_evt_v WHERE $method like '%$keyword%' ORDER BY evt_id";
  $result = mysqli_query($connection, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Search Result </title>
  <link href="../bootstrap.min.css" rel="stylesheet">
  <link href="../bootstrap-table.min.css" rel="stylesheet">
  <script src="../jquery-3.6.0.min.js"></script>
  <script src="../bootstrap.min.js"></script>
  <script src="../bootstrap-table.min.js"></script>
  <script src="../bootstrap-dropdown.js"></script>
  <script src="../application.js"></script>
  <style type="text/css">td {text-align: center;}</style>
</head>

<body>
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
        <li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="cust-event.php">Event<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="cust-event.php">Search</a></li>
            <li><a href="cust-event-reg.php">Registered</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="cust-room.php">Study room<b class="caret"></b></a>
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
      <form action="cust-event.php" method="post">
        <select name="search-meth">
          <option value="evt_name">Name</option>
          <option value="top_name">Topic</option>
        </select>

        <div class="input-group">
          <input type="text" class="form-control" name="search-info" />
          <div class="input-group-btn">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php
  if (isset($result)) {
  ?>
  <div class="container">
    <div class="row">
      <table class="table table-striped">
        <?php
        echo "<tr><td>Exhibition ID</td><td>Exhibition Name</td><td>Start Date</td><td>End Date</td><td>Topic</td><td>Status</td></tr>";
        while ($row=mysqli_fetch_assoc($result)) {
          $evt_id = $row["evt_id"];
          $evt_name = $row["evt_name"];
          $top_name = "<td style='vertical-align: middle;'>{$row['top_name']}";
          $stop_dt = $row["evt_stopdt"];
          echo "<tr><td style='vertical-align: middle;'>{$row["evt_id"]}</td>";
          echo "<td style='vertical-align: middle;'>{$row["evt_name"]}</td>";
          echo "<td style='vertical-align: middle;'>{$row["evt_startdt"]}</td>";
          echo "<td style='vertical-align: middle;'>{$row["evt_stopdt"]}</td>";
          while ($row=mysqli_fetch_assoc($result)) {
            if ($row["evt_name"] == $evt_name) {
              $top_name .= "<br>{$row["top_name"]}";
            } else {
              break;
            }
          }
          $top_name .= "</td>";
          echo $top_name;
          $cur_dt = date('Y-m-d h:i:s', time());
          if (strtotime($stop_dt)<strtotime($cur_dt)) {
            echo "<td style='vertical-align: middle;'>Closed</td>";
          } else {
            echo "<td style='vertical-align: middle;'><form action='cust-event-register.php' method='post'><button class='btn btn-primary' type='submit' name='evt_id' value='$evt_id'>Register</button></form></td>";
          }
          echo "</tr>";
        }
        ?>
      </table>
    </div>
  </div>
  <?php
  }
  ?>

</body>
</html>
