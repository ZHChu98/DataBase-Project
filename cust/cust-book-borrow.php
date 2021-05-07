<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$bkcpy_id = $_POST["bkcpy_id"];
$user_id = $_COOKIE["user"];
$sql = "SELECT DISTINCT bk_isbn, bk_title, bkcpy_id FROM ydzc_cust_bk_v WHERE bkcpy_id=$bkcpy_id";
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
      <form action="cust-book-borrow-confirm" method="post">
        <table class="table table-striped">
          <?php
          $row = mysqli_fetch_assoc($result);
          echo "<tr><td>ISBN</td><td>{$row['bk_isbn']}</td></tr>";
          echo "<tr><td>Title</td><td>{$row['bk_title']}</td></tr>";
          echo "<tr><td>Copy ID</td><td>{$row['bkcpy_id']}</td></tr>";
          echo "<tr><td>Borrow Date</td><td>".date('Y-m-d', time())."</td></tr>";
          echo "<tr><td>Expected Return Date</td><td>".date('Y-m-d', time()+30*24*60*60)."</td></tr>";
          ?>
        </table>

        <div>
          <button type="text submit" class="btn btn-primary" name="bkcpy_id" value="<?php echo $bkcpy_id ?>">Comfirm</button>
          <a type="button" class="btn btn-primary" href="cust-book.php">Back</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
