<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
</head>
<body style='height:1000px;background-color: coral; display:flex;flex-direction:column;align-items: 
center'>
    
   <h1 style='color:black'> STUDENT MANAGEMENT</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
       <input type="number" name="id" placeholder="RollNo"><br><br>
        <input type="text" name="name"  placeholder="Name"><br><br>
        <input type="text" name="subject" placeholder="Subject"><br><br>
        <input type="number" name="mark1" placeholder="mark1"><br><br>
        <input type="number" name="mark2" placeholder="mark2"><br><br>
        <input type="number" name="mark3" placeholder="mark3"><br><br>
        <button type="submit" name="insert" value="insert">Insert</button>
        <button type="submit" name="delete" value="delete">Delete</button>
        <button type="submit" name="update" value="update">Update</button>
        <button type="submit" name="select" value="select">Select</button>
        <button type="submit" name="search" value="search">Search</button>
</form>

<?php
   if(isset($_POST['insert']))
   {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $sub=$_POST['subject'];
    $mark1=$_POST['mark1'];
    $mark2=$_POST['mark2'];
    $mark3=$_POST['mark3'];
    $con=mysqli_connect("localhost","root","","db_sample");
    if(!$con)
    {
        echo "Connection failed".mysqli_connect_error();
    }
    $sql="insert into student values($id,'$name','$sub',$mark1,$mark2,$mark3)";
    if(mysqli_query($con,$sql))
    {
        echo "Inserted successfully";
    }
    else
    {
        echo"error in inserting";
    }
    mysqli_close($con);
   }

   if(isset($_POST["delete"]))
   {
     $id=$_POST['id'];
     $con=mysqli_connect("localhost","root","","db_sample");
     if(!$con)
    {
        echo "Connection failed".mysqli_connect_error();
    }
    $sql="delete from student where id=$id";
    if(mysqli_query($con,$sql))
    {
        echo "Deleted successfully";
    }
    else
    {
        echo"error in deleting";
    }
    mysqli_close($con);
   }


   if(isset($_POST['update']))
   {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $sub=$_POST['subject'];
    $mark1=$_POST['mark1'];
    $mark2=$_POST['mark2'];
    $mark3=$_POST['mark3'];
    $con=mysqli_connect("localhost","root","","db_sample");
    if(!$con)
    {
        echo "Connection failed".mysqli_connect_error();
    }
    $sql="update student set name='$name', subject='$sub', mark1=$mark1, mark2=$mark2, mark3=$mark3 where id=$id";

    if(mysqli_query($con,$sql))
    {
        echo "Updated successfully";
    }
    else
    {
        echo"error in updating";
    }
    mysqli_close($con);
   }

   if(isset($_POST["search"]))
   {
     $id=$_POST['id'];
     $con=mysqli_connect("localhost","root","","db_sample");
     if(!$con)
    {
        echo "Connection failed".mysqli_connect_error();
    }
    $sql="select * from student where id=$id";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            echo "Name: ".$row["name"]."<br><br>";
        }
    }
    else
    {
        echo "Student Not Found";
    }
    mysqli_close($con);
   }

   if(isset($_POST["select"]))
   {
     $con=mysqli_connect("localhost","root","","db_sample");
     if(!$con)
    {
        echo "Connection failed".mysqli_connect_error();
    }
    $sql="select * from student";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            echo "Name: ".$row["name"]."<br><br>";
        }
    }
    else
    {
        echo "No records found";
    }
    mysqli_close($con);
   }

?>

</body>
</html>
