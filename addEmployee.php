<?php
    session_start();
    if(!isset($_SESSION["name"])){
        header("location:index.php");
    }
    if(isset($_POST['emp_no'])){
        $emp_no=$_POST['emp_no'];
    }
    if(isset($_POST['birth_date'])){
        $birth_date=$_POST['birth_date'];
    }
    if(isset($_POST['first_name'])){
        $first_name=$_POST['first_name'];
    }
    if(isset($_POST['last_name'])){
        $last_name=$_POST['last_name'];
    }
    if(isset($_POST['gender'])){
        $gender=$_POST['gender'];
    }
    if(isset($_POST['hire_date'])){
        $hire_date=$_POST['hire_date'];
    }
    $num=100;
    if(isset($_SESSION['limit'])){
        $num=$_SESSION['limit'];
    }
    $conn=mysqli_connect("localhost","Sami Akram","");
    mysqli_select_db($conn,"employees");
    $query="insert into employees values(\"$emp_no\",\"$birth_date\",\"$first_name\",\"$last_name\",\"$gender\",\"$hire_date\");";
    $result=mysqli_query($conn,$query);
    if(!$result){
        echo "ERROR: " . mysqli_error($con);
    }else{
        echo "done";
    }
    mysqli_close($conn);
?>