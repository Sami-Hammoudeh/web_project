<?php
    session_start();
    $userName=$_POST['userName'];
    $password=$_POST['password'];
    $type=$_POST['type'];
    $password=md5($password);
    $_SESSION['name']=$userName;
    $_SESSION['password']=$password;
    $conn=mysqli_connect("localhost","Sami Akram","");
    mysqli_select_db($conn,"employees");
    $query="select name from users where name='$userName';";
    if($type=="login"){
        $query="select name from users where name='$userName' and password='$password';";
    }
    $result=mysqli_query($conn,$query);
    $row=mysqli_num_rows($result);
    if ($row){
        $data=mysqli_fetch_row($result);
        $_SESSION['name']=$data[0];
        echo "true";
    }else{
        echo "false";
    }
    mysqli_close($conn);
?>