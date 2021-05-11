<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
if (isset($_POST["search-meth"]) && isset($_POST["search-info"])) {
  $method = $_POST["search-meth"];
  $keyword = $_POST["search-info"];
  $user_id = $_COOKIE["user"];
  $sql = "SELECT DISTINCT * FROM ydzc_invt WHERE $method like '%$keyword%'";
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
  <script>
    function deleteconfirm() {
      var deletecusform = document.getElementById('authdeleteform').value;
      var r = confirm("Are you sure you want to delete?");
      if (r == true) {
        deleteauthform.submit();
        alert("successful delete!");
      }
    }
  </script>
</head>

<body>
  <header>
    <img src="../pictures/header-image.png" width=100% />
  </header>
  
  <div class="container">
    <div class="row">
      <ul class="nav nav-pills">
        <li><a href="admin-home.php">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="admin-cust.php">Customer<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="admin-cust.php">Profile</a></li>
            <li><a href="admin-cust-rental.php">Rental</a></li>
            <li><a href="admin-cust-event.php">Event</a></li>
            <li><a href="admin-cust-room.php">Study Room</a></li>
          </ul>
        </li>
        <li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="admin-auth.php">Author<b class="caret"></b></a>
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
        <form action="admin-auth-seminar.php" method="post">
          <select class="bootstrap-select" data-style="btn-info" name="search-meth" >
            <optgroup label="Picnic">
              <option value="invt_id">invitation id</option>
              <option value="evt_id">event id</option>
              <option value="auth_id">author id</option>
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
        echo "<tr><td>invt id</td><td>evt id</td><td>auth id</td></tr>";
        $row = mysqli_fetch_assoc($result);
        while($row) {
          $userid=$row['invt_id'];
          echo "<tr><td>{$row['invt_id']}</td><td>{$row['evt_id']}</td><td>{$row['auth_id']}</td></tr>";
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
