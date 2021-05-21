<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$isbn = $_POST['isbn'];
$bktitle = $_POST['bktitle'];
$sql = "INSERT INTO ydzc_invt VALUES ('{$isbn}', '{$bktitle}');";
$result = mysqli_query($connection, $sql);
header('location: admin-book.php')
?>