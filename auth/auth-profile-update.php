<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$user_id = $_COOKIE["user_id"];
$fname = $_POST["fname"];
$lname = $_POST['lname'];
$email = $_POST['email'];
$hno = $_POST['hno'];
$st = $_POST['st'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$zip = $_POST['zip'];
$sql = "UPDATE ydzc_auth SET auth_fname='$fname', auth_lname='$lname', auth_email='$email', auth_hno='$hno', auth_st='$st', auth_city='$city', auth_state='$state', auth_country='$country', auth_zip=$zip WHERE auth_id=$user_id";
mysqli_query($connection, $sql);
header("Location: auth-home.php");
?>