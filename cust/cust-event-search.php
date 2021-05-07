<?php
$method = $_POST["search-method"];
$keyword = $_POST["search-info"];
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "project");

if ($method == "name") {
$sql = "SELECT DISTINCT evt_name, evt_id, evt_type, evt_startdt, evt_stopdt, top_name FROM ydzc_cust_evt_v WHERE evt_name like '%$keyword%'";
} elseif ($method == "type") {
$sql = "SELECT DISTINCT evt_name, evt_id, evt_type, evt_startdt, evt_stopdt, top_name FROM ydzc_cust_evt_v WHERE evt_type='$keyword'";
} elseif ($method == "topic") {
$sql = "SELECT DISTINCT a.evt_name, a.evt_id, a.evt_type, a.evt_startdt, a.evt_stopdt, a.top_name FROM ydzc_cust_evt_v a, ydzc_cust_evt_v b WHERE b.top_name='$keyword' AND a.evt_id=b.evt_id";
}

$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Search Result </title>
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
        <li><a href="cust-home.html">Home</a></li>
        <li><a href="cust-book.html">Book</a></li>
        <li class="active"><a href="cust-event.html">Event</a></li>
        <li><a href="cust-room.html">Study room</a></li>
        <li class="pull-right"><a href="login.html">Logout</a></li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <form action="cust-event-search.php" method="post">
        <select name="search-method">
          <option value="name">Event Name</option>
          <option value="type">Type</option>
          <option value="topic">Topic</option>
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

  <div class="container">
    <div class="row">
      <table class="table table-striped">
        <?php
        echo "<tr><td>Name</td><td>Type</td><td>Start Date</td><td>Stop Date</td><td>Topic</td><td>Status</td></tr>";
        $row=mysqli_fetch_assoc($result);
        while ($row) {
          $evt_id = $row["evt_id"];
          $evt_name = $row["evt_name"];
          $top_name = "<td>{$row['top_name']}";
          $stop_dt = $row["evt_stopdt"];
          echo "<tr><td>{$row["evt_name"]}</td>";
          if ($row["evt_type"] == "E") {
            echo "<td>Exhibition</td>";
          } elseif ($row["evt_type"] == "S") {
            echo "<td>Seminar</td>";
          }
          echo "<td>{$row["evt_startdt"]}</td>";
          echo "<td>{$row["evt_stopdt"]}</td>";
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
            echo "<td>Closed</td>";
          } else {
            echo "<td><form name='reg_evt_id' action='cust-event-reg.php'><a type='submit' value='$evt_id'>Register</button></form></td>";
          }
          echo "</tr>";
        }
        ?>
      </table>
    </div>
  </div>

</body>
</html>
