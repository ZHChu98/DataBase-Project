<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) { die("Could not connect: ".mysqli_connect_error()); }
mysqli_select_db($connection, 'ydzc_rtl');

$username = $_POST["username"];
$password = $_POST["password"];

$user_type = $username[0];
$user_id = substr($username, 1);

$expire=time()+60*60*24*30;
setcookie("user_type", $user_type, $expire, "/");
setcookie("user_id", $user_id, $expire, "/");

if ($user_type == "C") {
    header("Location: ../cust/cust-home.html");
} elseif ($user_type == "A") {
    header("Location: ../auth/auth-home.php");
} elseif ($user_type == "E") {
    header("Location: ../admin/admin-home.html");
}
?>