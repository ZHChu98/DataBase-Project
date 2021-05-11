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
    $spassword = sha1($_POST['password']);
    $fname = $_POST["Fname"];
    $lname = $_POST['Lname'];
    $email = $_POST['email'];
    $phone = $_POST['telphone'];
    $idtype = $_POST['idtype'];
    $idno = $_POST['idnumber'];
    $sql = "INSERT into ydzc_cust VALUES (NULL, '$spassword', '$fname', '$lname', '$email', '$idtype', '$idno')";
} else if ($sptype == "Author") {
    $spassword = sha1($_POST['password']);
    $fname = $_POST["Fname"];
    $lname = $_POST['Lname'];
    $email = $_POST['email'];
    $hno = $_POST['house number'];
    $st = $_POST['sreet'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $zip = $_POST['zip'];
    $sql = "INSERT into ydzc_auth VALUES (NULL, '$spassword', '$fname', '$lname', '$email', '$hno', '$st', '$city', '$state', '$country', '$zip')";
}
mysqli_query($connection, $sql);
header("location: $DestinationPage");
mysqli_close($connection);
?>