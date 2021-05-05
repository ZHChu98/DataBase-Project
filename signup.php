<?php
// echo htmlspecialchars(print_r($_POST, true));
// print_r($_POST);
$DestinationPage = "login.html";
$connection = mysqli_connect("localhost", "root", "");
if (!$connection){
    die('Could not connect: '.mysqli_connect_error());
} else {
    $success = "success!";
    echo $success;
}
mysqli_select_db($connection, 'test2');
$sptype = $_POST['sptype'];
if ($sptype == "Customer") {
    $sql = "INSERT into  () VALUES ()";
} else if ($sptype == "Author") {
    $sql = "INSERT into  () VALUES ()";
} else if ($sptype == "Administrator") {
    $sql = "INSERT into  () VALUES ()";
}
mysqli_query($connection, $sql);
header("location: $DestinationPage");
mysqli_close($connection);
?>