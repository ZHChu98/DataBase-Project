<?php
   $username = $_POST['username'];
   $login_type = $username[0];
   $rusername = substr($username, 1);
   $password = $_POST['password'];
   $spassword = sha1($password);
   $spassword = strtoupper($spassword);
   $connection = mysqli_connect("localhost", "root", "");
   if (!$connection){
       die('Could not connect: '.mysqli_connect_error());
   } 
   mysqli_select_db($connection, 'ydzc_rtl');
   mysqli_query($connection, "set names utf8mb4");
   if($username[0] == "c"){
    // $sql = "SELECT * from ydzc_cust WHERE cust_id='$username' and cust_password='{$spassword}'";
    $sql = "SELECT * from ydzc_cust WHERE cust_id='$rusername'";
    $hascus = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($hascus);
    if ($num == "1") {
        $expire=time()+60*60*24;
        $path="/";
        setcookie("user", $rusername, $expire, $path);
        header("location: ../cust/cust-home.php");
    } else {
        echo"wrong password";
    }
   }
   
   else if ($username[0] == "a"){
    $sql = "SELECT * from ydzc_auth WHERE auth_id='$rusername'";
    $hascus = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($hascus);
    if ($num == "1") {
        $expire=time()+60*60*24;
        $path="/";
        setcookie("user", $rusername, $expire, $path);
        header("location: ../auth/auth-home.php");
    }
   } else if ($username[0] == "d"){
    $sql = "SELECT * from ydzc_admin WHERE admin_id='$rusername'";
    $hascus = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($hascus);
    if ($num == "1") {
        echo("yes");
        $expire=time()+60*60*24;
        $path="/";
        setcookie("user", $rusername, $expire, $path);
        header("location: ../admin/admin-home.php");
    }
   }
?>