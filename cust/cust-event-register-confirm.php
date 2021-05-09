<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$evt_id = $_POST["evt_id"];
$user_id = $_COOKIE["user"];
$sql = "CALL ydzc_cust_evt_reg_p($user_id, $evt_id)";
$result = mysqli_query($connection, $sql);
header("Location: cust-event.php");
?>