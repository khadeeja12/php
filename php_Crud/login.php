<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style='height:1000px;background-color:coral; display:flex;flex-direction:column;align-items: 
center'>
    <h1>LOGIN</h1>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="password" name="password"  placeholder="Password"><br><br>
        <button type="submit" name="login" value="login">Login</button>
    </form>

    <?php
    
 if(isset($_POST['login']))
 {
    $con=mysqli_connect("localhost","root","","db_sample");
   $username=$_POST['username'];
   $pass=$_POST['password'];
   $sql="select * from login where username='$username' and password='$pass'";
   $data=mysqli_query($con,$sql);
   if($data)
   {
    if(mysqli_num_rows($data)==1)
    {
      $row=mysqli_fetch_array($data);
      $_SESSION['username']=$row['username'];
      $_SESSION['password']=$row['password'];
      $_SESSION['id']=$row['id'];
      if($row['usertype']==0)
      {
        header("location:index.php");
        exit();
      }
      elseif($row['usertype']==1)
      {
        header("location:main.php");
        exit();
      }
    }
    else
    {
      header("location:login.php?error=incorrect username or password");
      exit();
    }
   }
   else
   {
     echo "Error: " . $sql . "<br>" . mysqli_error($con);
   }
   mysqli_close($con);
 } 
?>
</body>
</html>
