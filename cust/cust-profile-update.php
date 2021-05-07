<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$user_id = $_COOKIE["user"];
$fname = $_POST["fname"];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$idtype = $_POST['idtype'];
$idno = $_POST['idno'];
$sql = "UPDATE ydzc_cust SET cust_fname='$fname', cust_lname='$lname', cust_email='$email', cust_phone='$phone', cust_idtype='$idtype', cust_idno='$idno' WHERE cust_id=$user_id";
mysqli_query($connection, $sql);
header("Location: cust-home.php");
?>