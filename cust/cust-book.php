<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
if (isset($_POST["search-meth"]) && isset($_POST["search-info"])) {
  $method = $_POST["search-meth"];
  $keyword = $_POST["search-info"];
  $user_id = $_COOKIE["user"];

  $sql1 = "SELECT DISTINCT bk_isbn, bk_title, auth_fname, auth_lname FROM ydzc_cust_bk_v WHERE $method like '%$keyword%' ORDER BY bk_isbn, auth_fname, auth_lname";
  $sql2 = "SELECT DISTINCT bk_isbn, top_name FROM ydzc_cust_bk_v WHERE $method like '%$keyword%' ORDER BY bk_isbn, top_name";
  $sql3 = "SELECT DISTINCT bk_isbn, bkcpy_id, bkcpy_stat FROM ydzc_cust_bk_v WHERE $method like '%$keyword%' ORDER BY bk_isbn, bkcpy_id";

  $result1 = mysqli_query($connection, $sql1);
  $result2 = mysqli_query($connection, $sql2);
  $result3 = mysqli_query($connection, $sql3);
}
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
  <style type="text/css">td {text-align: center;}</style>
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
      <form action="cust-book.php" method="post">
        <select name="search-meth">
          <option value="bk_isbn">ISBN</option>
          <option value="bk_title">Title</option>
          <option value="concat(auth_fname, ' ', auth_lname)">Author</option>
          <option value="top_name">Topic</option>
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
  if (isset($result1)) {
  ?>
  <div class="container">
    <div class="row">
      <table class="table table-striped">
        <?php
        echo "<tr><td>ISBN</td><td>Title</td><td>Author</td><td>Topic</td><td>Copy ID</td><td>Status</td></tr>";
        $row1 = mysqli_fetch_assoc($result1);
        $row2 = mysqli_fetch_assoc($result2);
        $row3 = mysqli_fetch_assoc($result3);
        while ($row1) {
          $isbn = $row1['bk_isbn'];
          # count copy
          $count = 0;
          $copy_str = "";
          do {
            $copy_str .= "<tr><td style='vertical-align: middle;'>{$row3['bkcpy_id']}</td>";
            if ($row3['bkcpy_stat']=="Y") {
              $copy_str .= "<td style='vertical-align: middle;'><form action='cust-book-borrow.php' method='post'><button type='submit' class='btn btn-primary' name='bkcpy_id' value='{$row3['bkcpy_id']}'>Available</button></form></td></tr>";
            } else {
              $copy_str .= "<td style='vertical-align: middle;'>Unavailable</td></tr>";
            }
            $count += 1;
            $row3 = mysqli_fetch_assoc($result3); 
          } while ($row3 && $row3['bk_isbn']==$isbn);
          # isbn, title
          echo "<tr><td rowspan='$count' style='vertical-align: middle;'>{$row1['bk_isbn']}</td>";
          echo "<td rowspan='$count' style='vertical-align: middle;'>{$row1['bk_title']}</td>";
          # author
          echo "<td rowspan='$count' style='vertical-align: middle;'>{$row1['auth_fname']} {$row1['auth_lname']}";
          while ($row1=mysqli_fetch_assoc($result1)) {
            if ($row1['bk_isbn']==$isbn) {
              echo "<br>{$row1['auth_fname']} {$row1['auth_lname']}";
            } else {
              break;
            }
          }
          echo "</td>";
          # topic
          echo "<td rowspan='$count' style='vertical-align: middle;'>{$row2['top_name']}";
          while ($row2=mysqli_fetch_assoc($result2)) {
            if ($row2['bk_isbn'] == $isbn) {
              echo "<br>{$row2['top_name']}";
            } else {
              break;
            }
          }
          echo "</td>";
          # copy
          echo substr($copy_str, 4);
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