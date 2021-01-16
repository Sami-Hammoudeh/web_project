<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Home Page
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <script>
        function checkUser() {
            var userData = {};
            userData.userName = $('#userName').val();
            userData.password = $('#password').val();
            userData.type = "login";
            $.ajax({
                url: "checkUser.php",
                method: "post",
                data: userData,
                success: function (exist) {
                    if (exist == "true") {
                        window.open("welcome.php", "_self");
                    } else {
                        alert("Username or password is wrong");
                    }
                },
                error: function () {
                    alert("ERROR");
                }
            })
        }
    </script>
    <script>
        function checkAndCreat() {
            var user = {};
            user.userName = $('#userName2').val();
            user.password = $('#password2').val();
            user.rePassword = $('#rePassword2').val();
            if (user.password != user.rePassword) {
                alert("Wrong password");
                return;
            }
            createAcc(user);
        }
        function createAcc(user) {
            user.type="signup";
            $.ajax({
                url: "checkUser.php",
                method: "post",
                data: user,
                success: function (exist) {
                    if (exist=="true") {
                        alert("User already exist");
                    } else {
                        alert("Done");
                        $("#userName2").val("");
                        window.open("createUser.php","_self");
                    }
                },
                error: function () {
                    alert("ERROR");
                }
            })
        }
    </script>
    <style>
        body {
            margin: 0 auto;
            padding: 0px;
            text-align: center;
            width: 100%;
            font-family: "Myriad Pro", "Helvetica Neue", Helvetica, Arial, Sans-Serif;
            background-color: #ECF0F1;
        }

        #wrapper {
            margin: 0 auto;
            padding: 0px;
            text-align: center;
            width: 995px;
        }

        #wrapper h1 {
            margin-top: 50px;
            font-size: 45px;
            color: #424949;
        }

        #wrapper h1 p {
            font-size: 18px;
        }

        .form_div {
            width: 330px;
            margin-left: 320px;
            padding: 10px;
            background-color: #424949;
        }

        .form_div .form_label {
            margin: 15px;
            margin-bottom: 30px;
            font-size: 25px;
            font-weight: bold;
            color: white;
            text-decoration: underline;
        }

        .form_div input[type="text"],
        input[type="password"] {
            width: 230px;
            height: 40px;
            border-radius: 2px;
            font-size: 17px;
            padding-left: 5px;
            border: none;
        }

        .form_div input[type="submit"] {
            width: 230px;
            height: 40px;
            border: none;
            border-radius: 2px;
            font-size: 17px;
            background-color: #7F8C8D;
            border-bottom: 3px solid #616A6B;
            color: white;
            font-weight: bold;
        }

        @media only screen and (min-width:700px) and (max-width:995px) {
            #wrapper {
                width: 100%;
            }

            #wrapper h1 {
                font-size: 30px;
            }

            .form_div {
                width: 50%;
                margin-left: 25%;
                padding-left: 0px;
                padding-right: 0px;
            }

            .form_div input[type="text"],
            input[type="password"] {
                width: 80%;
            }

            .form_div textarea {
                width: 80%;
            }

            .form_div input[type="submit"] {
                width: 80%;
            }
        }

        @media only screen and (min-width:400px) and (max-width:699px) {
            #wrapper {
                width: 100%;
            }

            #wrapper h1 {
                font-size: 30px;
            }

            .form_div {
                width: 60%;
                margin-left: 20%;
            }

            .form_div input[type="text"],
            input[type="password"] {
                width: 80%;
            }

            .form_div input[type="submit"] {
                width: 80%;
            }
        }

        @media only screen and (min-width:100px) and (max-width:399px) {
            #wrapper {
                width: 100%;
            }

            #wrapper h1 {
                font-size: 25px;
            }

            .form_div {
                width: 90%;
                margin-left: 5%;
                padding-left: 0px;
                padding-right: 0px;
            }

            .form_div input[type="text"],
            input[type="password"] {
                width: 80%;
            }

            .form_div input[type="submit"] {
                width: 80%;
            }
        }
    </style>
    <div id="wrapper">
        <div class="form_div">
            <p class="form_label">LOGIN</p>
            <p><input type="text" id="userName" placeholder="Enter Name"></p>
            <p><input type="password" id="password" placeholder="**********"></p>
            <p><input type="submit" value="LOGIN" onclick="checkUser()" ></p>
        </div>
        <br>
        <br>
        <br>
        <div class="form_div">
            <p class="form_label">SIGNUP</p>
            <p><input type="text"  placeholder="Enter Userame" id="userName2"></p>
            <p><input type="password"  placeholder="Enter Password" id="password2"></p>
            <p><input type="password" placeholder="Re Enter Password" id="rePassword2"></p>
            <p><input type="submit" value="SIGNUP" onclick="checkAndCreat()"></p>
        </div>

    </div>
</body>

</html>