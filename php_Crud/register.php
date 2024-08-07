<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body style='height:1000px;background-color: coral; display:flex;flex-direction:column;align-items: 
center'>
    <h1>REGISTER</h1>
    <form action="" method="post">
        <input type="email" name="email" placeholder="Email"><br><br>
        <input type="text" name="name" placeholder="Username"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <button type="submit" name="register" value="register">Register</button>
    </form>
 
    <?php
    if(isset($_POST['register']))
    {
        $mail = $_POST['email'];
        $username = $_POST['name'];
        $pass = $_POST['password'];

        $con = mysqli_connect("localhost", "root", "", "db_sample");
        if(!$con)
        {
            echo "Connection failed: " . mysqli_connect_error();
        }

        $sql = "INSERT INTO register (email, username, password) VALUES ('$mail', '$username', '$pass')";
        
        if(mysqli_query($con, $sql))
        {
            $q = "INSERT INTO login (username, password, usertype) VALUES ('$username', '$pass', 1)";
            if(mysqli_query($con, $q))
            {
                echo "Registered successfully";
            }
            else
            {
                echo "Failed to register";
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
