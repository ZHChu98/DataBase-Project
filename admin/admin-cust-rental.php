<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
if (isset($_POST["search-meth"]) && isset($_POST["search-info"])) {
  $method = $_POST["search-meth"];
  $keyword = $_POST["search-info"];
  $user_id = $_COOKIE["user"];
  $sql = "SELECT DISTINCT * FROM ydzc_rent WHERE $method like '%$keyword%'";
  $result = mysqli_query($connection, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Customer Rental </title>
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
        <form action="admin-cust-rental.php" method="post">
          <select class="bootstrap-select" data-style="btn-info" name="search-meth" >
            <optgroup label="Picnic">
              <option value="rent_id">rentID</option>
              <option value="rent_stat">state</option>
              <option value="bkcpy_id">bookcopy</option>
              <option value="cust_id">customer</option>
            </optgroup>
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
        echo "<tr><td>ID</td><td>state</td><td>borrow time</td><td>expected return time</td><td>actual return time</td><td>copy id</td><td>customer id</td><td>edit</td><td>delete</td></tr>";
        $row = mysqli_fetch_assoc($result);
        while($row) {
          $userid=$row['rent_id'];
          echo "<tr><td>{$row['rent_id']}</td><td>{$row['rent_stat']}</td><td>{$row['rent_bordt']}</td><td>{$row['rent_erntdt']}</td><td>{$row['rent_arntdt']}</td><td>{$row['bkcpy_id']}</td><td>{$row['cust_id']}</td>";
          echo "<td><form action='admin-cust-rental-edit.php' method='post'><button type='submit' class='btn btn-primary' name='userid' value='$userid'>edit</button></form></td>";
          echo "<td><form action='admin-cust-rental-delete.php' method='post'><button type='submit' class='btn btn-primary' name='userid' value='$userid'>delete</button></form></td></tr>";
          $row = mysqli_fetch_assoc($result);
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
