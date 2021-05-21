<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$rms_id = $_POST['rmsect_id'];
$rm_dt = $_POST['rmsect_dt'];
$rm_ts = $_POST['rmsect_ts'];
$rm_rmncap = $_POST['rmsect_rmncap'];
$rm_id = $_POST['rm_id'];
$sql = "INSERT INTO ydzc_top VALUES ('{$rms_id}', '{$rm_cap}', '{$rm_ts}', '{$rm_rmncap}', '{$rm_id}');";
$result = mysqli_query($connection, $sql);
header('location: admin-room.php')
?>