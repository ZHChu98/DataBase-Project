<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$top_name = $_POST['top_name'];
$sql = "INSERT INTO ydzc_top VALUES ('{$isbn}');";
$result = mysqli_query($connection, $sql);
header('location: admin-topic.php')
?>