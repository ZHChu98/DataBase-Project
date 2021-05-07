<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection){
  die('Could not connect: '.mysqli_connect_error());
}
mysqli_select_db($connection, "ydzc_rtl");
$sql = "SELECT DISTINCT * FROM ydzc_cust";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Customer Profile </title>
  <link href="../bootstrap.min.css" rel=stylesheet>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
  <script src="../jquery.js"></script>
  <script src="../bootstrap-dropdown.js"></script>
  <script src="../application.js"></script>
</head>

<body>
  <header>
    <img src="../pictures/header-image.png" width=100%/>
  </header>
  
  <div class="container">
    <div class="row">
      <ul class="nav nav-pills">
        <li><a href="admin-home.html">Home</a></li>
        <li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="admin-cust.html">Customer<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="admin-cust.html">Profile</a></li>
            <li><a href="admin-cust-rental.html">Rental</a></li>
            <li><a href="admin-cust-event.html">Event</a></li>
            <li><a href="admin-cust-room.html">Study Room</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="admin-auth.html">Author<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="admin-auth.html">Profile</a></li>
            <li><a href="admin-auth-seminar.html">Seminar</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="admin-book.html">Book<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="admin-book.html">Book</a></li>
            <li><a href="admin-book-rental.html">Rental</a></li>
            <li><a href="admin-book-invoice.html">Invoice</a></li>
            <li><a href="admin-book-pay.html">Payment</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="admin-event.html">Event<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="admin-event.html">Event</a></li>
            <li><a href="admin-event-sponsor.html">Sponsor</a></li>
          </ul>
        </li>
        <li><a href="admin-room.html">Study Room</a></li>
        <li><a href="admin-topic.html">Topic</a></li>
        <li class="pull-right"><a href="../other/login.html">Logout</a></li>
      </ul>
    </div>
  </div>
  
  <div class="container">
    <div class="row">
      <table class="table table-striped">
        <?php
        echo "<tr><td>ID</td><td>firstname</td><td>lastname</td><td>phone</td><td>email</td><td>IDtype</td><td>IDNO</td></tr>";
        $row=mysqli_fetch_assoc($result);
        while ($row) {
        echo"<tr><td>{$row["CUST_ID"]}</td>";
        echo "<td>{$row["CUST_FNAME"]}</td>";
        echo "<td>{$row["CUST_LNAME"]}</td>";
        echo "<td>{$row["CUST_PHONE"]}</td>";
        echo "<td>{$row["CUST_EMAIL"]}</td>";
        echo "<td>{$row["CUST_IDTYPE"]}</td>";
        echo "<td>{$row["CUST_IDNO"]}</td></tr>";
        $row=mysqli_fetch_assoc($result);
        }
        ?>
      </table>
    </div>
  </div>
  
</body>
</html>
