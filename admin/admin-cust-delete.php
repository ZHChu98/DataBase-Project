<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$cust_id = $_POST['userid'];
$user_id = $_COOKIE["user"];
$sql = "DELETE * FROM ydzc_cust WHERE cust_id=$cust_id";
$result = mysqli_query($connection, $sql);
header('location: admin-cust.php');
?>
