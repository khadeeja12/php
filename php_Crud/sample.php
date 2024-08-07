<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample</title>
</head>
<body style="height:1000px;background-color:coral;display:flex;flex-direction:column;align-items:center;"><center>
    <h1>Student Management</h1>
    <form action="" method="POST">
    <input type="text" name="id" placeholder="id">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="subject" placeholder="subject">
    <input type="text" name="mark" placeholder="mark">
    <input type="submit" name="insert" value="insert">
    <input type="submit" name="select" value="select">
    <input type="submit" name="update" value="update">
    <input type="submit" name="delete" value="delete">
    </form>

    <?php
    if(isset($_POST['insert']))
    {
        $id=$_POST['id'];
        $name= $_POST['name'];
        $subject= $_POST['subject'];
        $mark= $_POST['mark'];
    }
    $con=mysqli_connect("localhost","root","","student");
    if(!con)
    {
        echo "connection failed".mysqli_connect_error();
    }
    $sql="insert into student values($id,'$name','$subject',$mark)";
    if(mysqli_query($con,$sql))
    {
        echo "inserted successfully";
    }
    else{
        echo "not inserted";
    }
    ?>
</center>
</body>
</html>