<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$user_id = $_COOKIE["user"];
$sql = "SELECT admin_id FROM ydzc_admin WHERE admin_id=$user_id";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Homepage </title>
  <link href="../bootstrap.min.css" rel=stylesheet>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
  <script src="../jquery.js"></script>
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
        <li class="active"><a href="admin-home.php">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="admin-cust.php">Customer<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="admin-cust.php">Profile</a></li>
            <li><a href="admin-cust-rental.php">Rental</a></li>
            <li><a href="admin-cust-event.php">Event</a></li>
            <li><a href="admin-cust-room.php">Study Room</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="admin-auth.php">Author<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="admin-auth.php">Profile</a></li>
            <li><a href="admin-auth-seminar.php">Seminar</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="admin-book.php">Book<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="admin-book.php">Book</a></li>
            <li><a href="admin-book-rental.php">Rental</a></li>
            <li><a href="admin-book-invoice.php">Invoice</a></li>
            <li><a href="admin-book-pay.php">Payment</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="admin-event.php">Event<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="admin-event.php">Event</a></li>
            <li><a href="admin-event-sponsor.php">Sponsor</a></li>
          </ul>
        </li>
        <li><a href="admin-room.php">Study Room</a></li>
        <li><a href="admin-topic.php">Topic</a></li>
        <li class="pull-right"><a href="../other/login.php">Logout</a></li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <table class="table table-striped">
        <?php
        $row = mysqli_fetch_assoc($result);
        echo "<tr><td>ID</td><td>{$row["admin_id"]}</td></tr>";
        ?>
      </table>
    </div>
  </div>

</body>
</html>
