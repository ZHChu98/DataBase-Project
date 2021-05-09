<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$user_id = $_COOKIE["user"];
$bkcpy_id = $_POST["bkcpy_id"];
$sql1 = "SELECT DISTINCT bkcpy_id, bk_isbn, bk_title FROM ydzc_cust_bk_v WHERE bkcpy_id=$bkcpy_id";
$sql2 = "SELECT DISTINCT bkcpy_id, auth_fname, auth_lname FROM ydzc_cust_bk_v WHERE bkcpy_id=$bkcpy_id";
$sql3 = "SELECT DISTINCT bkcpy_id, top_name FROM ydzc_cust_bk_v WHERE bkcpy_id=$bkcpy_id";
$result1 = mysqli_query($connection, $sql1);
$result2 = mysqli_query($connection, $sql2);
$result3 = mysqli_query($connection, $sql3);
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
        <li><a href="cust-home.php">Home</a></li>
        <li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="cust-book.php">Book<b class="caret"></b></a>
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
        $row1 = mysqli_fetch_assoc($result1);
        echo "<tr><td>Book ISBN</td><td>{$row1['bk_isbn']}</td></tr>";
        echo "<tr><td>Book Title</td><td>{$row1['bk_title']}</td></tr>";
        echo "<tr><td>Copy ID</td><td>{$row1['bkcpy_id']}</td></tr>";
        # author
        $row2 = mysqli_fetch_assoc($result2);
        echo "<tr><td>Author Name</td><td>{$row2['auth_fname']} {$row2['auth_lname']}";
        while ($row2=mysqli_fetch_assoc($result2)) {
          echo "<br>{$row2['auth_fname']} {$row2['auth_lname']}";
        }
        echo "</td></tr>";
        # topic
        $row3 = mysqli_fetch_assoc($result3);
        echo "<tr><td>Topic</td><td>{$row3['top_name']}";
        while ($row3=mysqli_fetch_assoc($result3)) {
          echo "<br>{$row3['top_name']}";
        }
        echo "</td></tr>";
        ?>
      </table>

      <div>
        <a type="button" class="btn btn-primary" href="cust-book-rent.php">Back</a>
      </div>
    </div>
  </div>

</body>
</html>
