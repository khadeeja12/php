<?php 
include('db_con.php');
   if($_SERVER['REQUEST_METHOD']=="GET")
   {
    $email=$_GET['email'];
    $username=$_GET['uname'];

    echo "username:$username";
    echo  "  email:$email";
   }