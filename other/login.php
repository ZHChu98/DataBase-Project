<?php
print_r($_POST);
$username = $_POST['username'];
$password = $_POST['password'];
$connection = mysqli_connect("localhost", "root", "");
$DestinationPage = "cust-home.html";
if (!$connection){
    die('Could not connect: '.mysqli_connect_error());
} else {
    $success = "success!";
    echo $success;
}
mysqli_select_db($connection, 'project');
$sql = "SELECT * from ydzc_auth";
$hascus = mysqli_query($connection, $sql);
$num = mysqli_num_rows($hascus);
echo $num;
if ($num) {
    $success = "login success!";
    echo $success;
    header("location: $DestinationPage");
}
else {
    echo'failed';
}
mysqli_close($connection);
?>