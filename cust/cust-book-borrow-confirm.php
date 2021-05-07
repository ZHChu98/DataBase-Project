<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$bkcpy_id = $_POST["bkcpy_id"];
$user_id = $_COOKIE["user"];
$sql = "CALL ydzc_cust_bk_borrow_p($user_id, $bkcpy_id)";
$result = mysqli_query($connection, $sql);
header("Location: cust-book.php");
?>