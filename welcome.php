<?php
    session_start();
    if(isset($_SESSION["name"])){
        $name=$_SESSION["name"];
        echo "<h1> Welcome $name!</h1>";
    }else{
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Welcome
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <script>
        function showAll() {
            window.open("showAll.php","_self");
        }
        function search() {
            var data={};
            data.first=$("#firstName").val();
            if($("#firstName").val()==""){
                data.first=false;
            }
            data.last=$("#lastName").val();
            if($("#lastName").val()==""){
                data.last=false;
            }
            data.department=$("#department").val();
            if($("#department").val()==""){
                data.department=false;
            }
            data.title=$("#title").val();
            if($("#title").val()==""){
                data.title=false;
            }
            data.min=$("#min").val();
            if($("#min").val()==""){
                data.min=false;
            }
            data.max=$("#max").val();
            if($("#max").val()==""){
                data.max=false;
            }
            $.ajax({
                url: "setSearch.php",
                method: "post",
                data : data
            })
            window.open("search.php","_self");
        }
        function changeLimit() {
            var data={};
            data.limit=$("#limit").val();
            if($("#limit").val()==""){
                $("#limit").val(100);
                data.limit=100;
            }
            $.ajax({
                url: "setSearch.php",
                method: "post",
                data : data
            })
        }
        function addEmployee(){
            var data={};
            data.emp_no=$("#emp_no").val();
            data.birth_date=$("#birth_date").val();
            data.first_name=$("#first_name").val();
            data.last_name=$("#last_name").val();
            data.gender=$("#gender").val();
            data.hire_date=$("#hire_date").val();
            $.ajax({
                url: "addEmployee.php",
                method: "post",
                data: data,
                success: function (res) {
                    if(res=="done"){
                        alert("Employee added succesfully!");
                    }else{
                        alert("There is an error of your data");
                    }
                },
                error: function () {
                    alert("ERROR in the server");
                }
            })
        }
        function showDeptMngr() {
            window.open("showDeptMngr.php","_self");
        }
        function showDeptEmp() {
            window.open("showDeptEmp.php","_self");
        }
        function searchDept() {
            var data={};
            data.department=$("#deptSearch").val();
            $.ajax({
                url: "setSearch.php",
                method: "post",
                data: data
            })
            window.open("searchDept.php","_self");
        }
        function addDepartment() {
            var data={};
            data.dept_no=$("#dept_no").val();
            data.dept_name=$("#dept_name").val();
            $.ajax({
                url: "addDepartment.php",
                method: "post",
                data: data,
                success: function (res) {
                    if(res=="done"){
                        alert("Department added succesfully!");
                    }else{
                        alert("There is an error of your data");
                    }
                },
                error: function () {
                    alert("ERROR in the server");
                }
            })
        }
    </script>
    <style>
        
    </style>
    Number of Records: <input type="text" name="limit" id="limit" value="<?php
                                                                                if(!isset($_SESSION['limit'])){ 
                                                                                    $_SESSION['limit']=100;
                                                                                }
                                                                                echo $_SESSION['limit'];
                                                                            ?>" onchange="changeLimit()"><br><br>
    <input type="button" name="employees" value="Show All Employees" onclick="showAll()"><br><br>
    Search: <br>
    First Name: <input type="text" name="firstName" placeholder="First Name" id="firstName" value="">
    Last Name: <input type="text" name="lastName" id="lastName" value="" placeholder="Last Name"><br>
    Department: <input type="text" name="department" id="department" value="" placeholder="Department">
    Title: <input type="text" name="title" id="title" value="" placeholder="Title"><br>
    Salary Between: <input type="text" name="min" id="min" value="" placeholder="Min Salary">
    And: <input type="text" name="max" id="max" value="" placeholder="Max Salary"><br>
    
    <input type="button" name="search" value="Search" onclick="search()"><br><br>
    Add New Employee: <br>
    emp_no: <input type="text" id="emp_no" name="emp_no" value="" placeholder="Employee Number"><br>
    birth_date: <input type="date" id="birth_date" name="birth_date" value="1999-12-28" ><br>
    first_name: <input type="text" id="first_name" name="first_name" value="" placeholder="First Name">
    last_name: <input type="text" id="last_name" name="last_name" value="" placeholder="Last Name"><br>
    gender: <input type="text" id="gender" name="gender" value="" placeholder="M or F"><br>
    hire_date: <input type="date" id="hire_date" name="hire_date" value="2020-12-31"><br>
    <input type="button" name="add" id="add" value="Add Employee" onclick="addEmployee()"><br><br>
    Depertments Section: <br>
    <input type="button" name="showDeptMngr" id="showDeptMngr" value="Show Deparments and Managers" onclick="showDeptMngr()"><br>
    <input type="button" name="showDeptEmp" id="showDeptEmp" value="Show Deparments and Employees" onclick="showDeptEmp()"><br><br>
    Search: <br>
    Department Name: <input type="text" name="deptSearch" id="deptSearch" value="" placeholder="Department Name"><br>
    <input type="button" value="Search" onclick="searchDept()"><br><br>
    Add Department: <br>
    dept_no: <input type="text" id="dept_no" name="dept_no" value="" placeholder="Department Number"><br>
    dept_name: <input type="text" id="dept_name" name="dept_name" value="" placeholder="Department Name"><br>
    <input type="button" value="Add Department" onclick="addDepartment()"><br><br>
    <a href="logout.php">Logout</a>
</body>

</html>