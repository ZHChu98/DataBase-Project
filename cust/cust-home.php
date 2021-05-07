<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$user_id = $_COOKIE["user"];
$sql = "SELECT * FROM ydzc_cust WHERE cust_id=$user_id";
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

<body onload="checkCookie()">
  <header>
    <img src="../pictures/header-image.png" width=100% />
  </header>

  <div class="container">
    <div class="row">
      <ul class="nav nav-pills">
        <li class="active"><a href="cust-home.php">Home</a></li>
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
      <table class="table table-striped">
        <?php
        $row = mysqli_fetch_assoc($result);
        echo "<tr><td>ID</td><td>{$row["cust_id"]}</td></tr>";
        echo "<tr><td>Name</td><td>{$row["cust_fname"]} {$row["cust_lname"]}</td></tr>";
        echo "<tr><td>Email</td><td>{$row["cust_email"]}</td></tr>";
        echo "<tr><td>Phone</td><td>{$row["cust_phone"]}</td></tr>";
        if ($row["cust_idtype"] == "P") {
          echo "<tr><td>Identification Type</td><td>Passport</td></tr>";
        } elseif ($row["cust_idtype"] == "S") {
          echo "<tr><td>Identification Type</td><td>SSN</td></tr>";
        } elseif ($row["cust_idtype"] == "D") {
          echo "<tr><td>Identification Type</td><td>Driver License</td></tr>";
        }
        echo "<tr><td>Identification Number</td><td>{$row["cust_idno"]}</td></tr>";
        ?>
      </table>
      <a type="button" class="btn btn-primary" href="cust-profile.php">Edit</a>
    </div>
  </div>


</body>
</html>
