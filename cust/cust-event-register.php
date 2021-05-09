<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$user_id = $_COOKIE["user"];
$evt_id = $_POST["evt_id"];
$sql = "SELECT evt_id, evt_name, evt_id, DATE_FORMAT(evt_startdt, '%Y-%m-%d') evt_startdt, DATE_FORMAT(evt_stopdt, '%Y-%m-%d') evt_stopdt, top_name FROM ydzc_cust_evt_v WHERE evt_id=$evt_id";
$result = mysqli_query($connection, $sql);
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
      <form action="cust-event-register-confirm.php" method="post">
        <table class="table table-striped">
          <?php
          $row = mysqli_fetch_assoc($result);
          echo "<tr><td>Event ID</td><td>{$row['evt_id']}</td></tr>";
          echo "<tr><td>Event Name</td><td>{$row['evt_name']}</td></tr>";
          echo "<tr><td>Type</td><td>Exhibition</td></tr>";
          echo "<tr><td>Start Date</td><td>{$row['evt_startdt']}</td></tr>";
          echo "<tr><td>End Date</td><td>{$row['evt_stopdt']}</td></tr>";
          ?>
        </table>

        <div>
          <button type="submit" class="btn btn-primary" name="evt_id" value="<?php echo $evt_id?>">Confirm</button>
          <a type="button" class="btn btn-primary" href="cust-event.php">Back</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
