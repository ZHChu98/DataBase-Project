<?php
echo $_POST;
$username = $_POST['username'];
$password = $_POST['password'];
echo $username;
$connection = mysqli_connect("localhost", "root", "");
$DestinationPage = "cust-home.html";

if (!$connection){
    die('Could not connect: '.mysqli_connect_error());
} 
mysqli_select_db($connection, 'test2');
$sql = "SELECT * from people WHERE ID='$username'";
$hascus = mysqli_query($connection, $sql);
$num = mysqli_num_rows($hascus);
echo $num;
?>