<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, "ydzc_rtl");
$id = $_POST["id"];
$state = $_POST["state"];
$bordt = $_POST['bordt'];
$erntdt = $_POST['erntdt'];
$arntdt = $_POST['arntdt'];
$bkcpyid = $_POST['bkcpyid'];
$custid = $_POST['custid'];
$invc_date = date();
$sql = "UPDATE ydzc_rent SET rent_id='$id', rent_stat='$state', rent_bordt='$bordt', rent_erntdt='$erntdt', rent_arntdt='$arntdt', bkcpy_id='$bkcpyid', cust_id='$custid' WHERE rent_id=$id";
$sql1 = "UPDATE ydzc_bkcpy SET bkcpy_stat='$state' WHERE bkcpy_id=bkcpyid";
// $sql2 = "INSERT INTO ydzc_invc VALUES (NULL , '{$invc_date}', '', '$id');";
mysqli_query($connection, $sql);
mysqli_query($connection, $sql1);
header("Location: admin-cust-rental.php");
?>