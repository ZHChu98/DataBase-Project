<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$cust_id = $_POST['userid'];
$user_id = $_COOKIE["user"];
$sql = "SELECT * FROM ydzc_auth WHERE auth_id=$cust_id";
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
      <form action="admin-auth-editF.php" method="post">
        <table class="table table-striped">
          <?php
          $row = mysqli_fetch_assoc($result);
          echo "<tr><td>id</td><td><input type='text' name='id' value='{$row["auth_id"]}'></td></tr>";
          echo "<tr><td>firstname</td><td><input type='text' name='fname' value='{$row["auth_fname"]}'></td></tr>";
          echo "<tr><td>lastname</td><td><input type='text' name='lname' value='{$row["auth_lname"]}'></td></tr>";
          echo "<tr><td>email</td><td><input type='text' name='email' value='{$row["auth_email"]}'></td></tr>";
          echo "<tr><td>house number</td><td><input type='text' name='hno' value='{$row["auth_hno"]}'></td></tr>";
          echo "<tr><td>street</td><td><input type='text' name='st' value='{$row["auth_st"]}'></td></tr>";
          echo "<tr><td>city</td><td><input type='text' name='city' value='{$row["auth_city"]}'></td></tr>";
          echo "<tr><td>state</td><td><input type='text' name='state' value='{$row["auth_state"]}'></td></tr>";
          echo "<tr><td>country</td><td><input type='text' name='country' value='{$row["auth_country"]}'></td></tr>";
          echo "<tr><td>zip</td><td><input type='text' name='zip' value='{$row["auth_zip"]}'></td></tr>";
          ?>
        </table>
        <div>
          <button type="submit" class="btn btn-primary">Comfirm</button>
          <a type="button" class="btn btn-primary" href="admin-cust.php">Back</a>
        </div>
      </form>

    </div>
  </div>

</body>
</html>
