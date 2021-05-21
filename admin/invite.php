<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$invt_id = $_POST['id'];
$evt_id = $_POST['eventid'];
$auth_id = $_POST['authorid'];
$sql = "INSERT INTO ydzc_invt VALUES ('{$invt_id}', '{$evt_id}', '{$auth_id}');";
$result = mysqli_query($connection, $sql);
header('location: admin-auth-seminar.php')
?>