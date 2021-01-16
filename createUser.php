<?php
    session_start();
    $name=$_SESSION['name'];
    $password=$_SESSION['password'];
    $conn=mysqli_connect("localhost","Sami Akram","");
    mysqli_select_db($conn,"employees");
    $query="insert into users(name,password) values('$name','$password');";
    echo $query;
    $result=mysqli_query($conn,$query);
    header("location:welcome.php");
?>