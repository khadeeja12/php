<?php
include('db_con.php');
$query = $con->query("create table if not exists tbl_register(id int(10) primary key auto_increment,email varchar(40),password varchar(40))");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample page</title>
</head>
<body>
    <h1>Hello, Its me Kaija</h1>
    <form action="serve.php" method="get">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="uname" placeholder="Username">
    <input type="submit" value="login">
</form>
</body>
</html>