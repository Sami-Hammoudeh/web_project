<?php
    session_start();
    if(!isset($_SESSION["name"])){
        header("location:index.php");
    }
    if(isset($_POST['first'])){
        $_SESSION['first']=$_POST['first'];
    }else{
        $_SESSION['first']=null;
    }
    if(isset($_POST['last'])){
        $_SESSION['last']=$_POST['last'];
    }else{
        $_SESSION['last']=null;
    }
    if(isset($_POST['department'])){
        $_SESSION['department']=$_POST['department'];
    }else{
        $_SESSION['department']=null;
    }
    if(isset($_POST['title'])){
        $_SESSION['title']=$_POST['title'];
    }else{
        $_SESSION['title']=null;
    }
    if(isset($_POST['min'])){
        $_SESSION['min']=$_POST['min'];
    }else{
        $_SESSION['min']=null;
    }
    if(isset($_POST['max'])){
        $_SESSION['max']=$_POST['max'];
    }else{
        $_SESSION['max']=null;
    }
    if(isset($_POST['limit'])){
        $_SESSION['limit']=$_POST['limit'];
    }
?>