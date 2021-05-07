<?php
// if(isset($_COOKIE["cookietype"]))
// {
//  header("location:../cust/cust-home.html");
// }
// if(isset($_POST["loginbutton"])){
    if(empty($_POST["username"]) || empty($_POST["password"]))
    {
       echo("Both Fields are required");
    }
   else {
   echo $_POST;
   $username = $_POST['username'];
   $password = $_POST['password'];
   echo $username;
   $connection = mysqli_connect("localhost", "root", "");
   if (!$connection){
       die('Could not connect: '.mysqli_connect_error());
   } 
   mysqli_select_db($connection, 'test2');
   $sql = "SELECT * from people WHERE ID='$username'";
   $hascus = mysqli_query($connection, $sql);
   $num = mysqli_num_rows($hascus);
   echo $num;
   }
?>