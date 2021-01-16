<?php
    session_start();
    if(!isset($_SESSION["name"])){
        header("location:index.php");
    }
    if(isset($_POST['dept_no'])){
        $dept_no=$_POST['dept_no'];
    }
    if(isset($_POST['dept_name'])){
        $dept_name=$_POST['dept_name'];
    }
    $num=100;
    if(isset($_SESSION['limit'])){
        $num=$_SESSION['limit'];
    }
    $conn=mysqli_connect("localhost","Sami Akram","");
    mysqli_select_db($conn,"employees");
    $query="insert into departments values(\"$dept_no\",\"$dept_name\");";
    $result=mysqli_query($conn,$query);
    if(!$result){
        echo "ERROR: " . mysqli_error($con);
    }else{
        echo "done";
    }
    mysqli_close($conn);
?>