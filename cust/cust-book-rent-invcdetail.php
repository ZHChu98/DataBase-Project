<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$user_id = $_COOKIE["user"];
$invc_id = $_POST["invc_id"];
$sql1 = "SELECT a.invc_id, DATE_FORMAT(a.invc_date, '%Y-%m-%d') invc_date, a.invc_amount, a.invc_rest, b.pay_id, DATE_FORMAT(b.pay_date, '%Y-%m-%d') pay_date, b.pay_amount, b.pay_meth FROM ydzc_invc a, ydzc_pay b WHERE a.invc_id=$invc_id AND a.invc_id=b.invc_id";
$result1 = mysqli_query($connection, $sql1);
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
        echo "<tr><td colspan='2'>Invoice ID</td><td colspan='3'>{$row1['invc_id']}</td></tr>";
        echo "<tr><td colspan='2'>Invoice Date</td><td colspan='3'>{$row1['invc_date']}</td></tr>";
        echo "<tr><td colspan='2'>Total Fee</td><td colspan='2'>{$row1['invc_amount']} $</td></tr>";
        echo "<tr><td colspan='2'>Unpaid Fee</td><td colspan='3'>{$row1['invc_rest']} $</td></tr>";
        echo "<tr><td colspan='5' style='text-align: center;'>Details</td></tr>";
        echo "<tr><td style='text-align: center;'>Payment ID</td><td style='text-align: center;'>Payment Date</td><td style='text-align: center;'>Payment Amount</td><td style='text-align: center;'>Payment Method</td><td style='text-align: center;'>Card Holder Name</td></tr>";
        $paid = $row1['invc_amount'] - $row1['invc_rest'];
        do {
          echo "<tr>";
          echo "<td style='text-align: center;'>{$row1['pay_id']}</td>";
          echo "<td style='text-align: center;'>{$row1['pay_date']}</td>";
          echo "<td style='text-align: center;'>{$row1['pay_amount']} $</td>";
          echo "<td style='text-align: center;'>{$row1['pay_meth']}</td>";
          if ($row1['pay_meth']=="CREDIT") {
            $sql2 = "SELECT paycc_chn FROM ydzc_cc WHERE pay_id={$row1['pay_id']}";
            $result2 = mysqli_query($connection, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            echo "<td style='text-align: center;'>{$row2['paycc_chn']}</td>";
          } else {
            echo "<td style='text-align: center;'> </td>";
          }
        } while ($row1=mysqli_fetch_assoc($result1));
        echo "<tr><td colspan='2' style='text-align: center;'>Paid</td><td style='text-align: center;'>";
        echo number_format($paid, 2);
        echo " $</td><td colspan='2'> </td></tr>";
        ?>
      </table>

      <div>
        <a type="button" class="btn btn-primary" href="cust-book-rent.php">Back</a>
      </div>
    </div>
  </div>
</body>
</html>
