<?php
   $server_name="localhost";
   $username="root";
   $password="";
   $database_name="db_sample";
   


   $con= new mysqli("$server_name","$username","$password","$database_name");
   if($con->connect_error)
   {
    echo "Connection error";
   }
   else
   {
    echo "Successfully connected";
   }

?>