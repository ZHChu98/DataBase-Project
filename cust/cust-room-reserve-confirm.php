<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$user_id = $_COOKIE["user"];
$rmsect_id = $_POST["rmsect_id"];
$sql = "CALL ydzc_cust_rm_resv_p($user_id, $rmsect_id)";
$result = mysqli_query($connection, $sql);
header("Location: cust-room.php");
?>