<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$rm_id = $_POST['rm_id'];
$rm_cap = $_POST['rm_cap'];
$sql = "INSERT INTO ydzc_top VALUES ('{$rm_id}', '{$rm_cap}');";
$result = mysqli_query($connection, $sql);
header('location: admin-room.php')
?>