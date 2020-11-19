<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'maze');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql1=$link->prepare("insert into user(username,mail,password) values(?,?,?)");
$sql1->bind_param("sss",$username,$mail,$pass2);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $sql = "SELECT * FROM user WHERE username = ?;";
    if($stmt = mysqli_prepare($link, $sql))
    {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        
        // Set parameters
        $param_username = trim($_POST["user"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);
            
            if(mysqli_stmt_num_rows($stmt) == 1){
                $username_err = "This username is already taken.";
                echo '<script>
                alert("Username already taken");
                </script>';
            } else{
                $username = trim($_POST["user"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }

    $mail=$_POST["mail"];
    $pass=$_POST["pass1"];
    $pass2=password_hash($pass,PASSWORD_DEFAULT);
    //$sql = "SELECT * FROM lock.user WHERE username = ?;";
$sql1->execute();
header("location: login.php");
}
?>
<html lang="en">
    <head>
    <title>Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body
        {
            background-image: url('back.jpg');
            background-size: cover;
            background-attachment: fixed, fixed;
            background-size: cover, cover;
            overflow: visible;
            margin: 0%;
        }
        header{
    height: 10vh;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;

}

li a {
  display: block;
  color: white;
  font-size: 1.3em;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  position: absolute;
  margin-left: 0%;

}

li a:hover {
  color: cyan;
}
.nav1
{
    margin: 0%;
    background-color: rgb(2, 2, 2,.8);
    height: 100%;
}
.nav2
{

    width: 70%;
    height: 100%;
  display: flex;
          justify-content: space-between;
}

.logo
{
    height: 100%;
    width: 100px;
    border-radius: 100%;
    
}

.active
{
    color: lightgreen;
}

.form
{
    height: 68%;
    width: 20%;
    background-color: rgb(3, 3, 3, .6);
    padding: 14px 25px;
    margin-left:38%;
    margin-top: 5%;
}
.avatar{
height: 120px;
border-radius: 50%;
opacity: 80%;
margin-top: -20%;
margin-left: 30%;
}

#form1 p
{
    font-size: 1.3em;
    color: blanchedalmond;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    text-shadow: 2px 2px 4px #867474;

}
#Cap {
            width: 20px;
            height: 20px;
            text-align: center;
            position: relative;
            margin-top: 7px;
            margin-left: 100px;
            margin-bottom: 7px;
            color: whitesmoke;
            font-size: 1.2em;
            letter-spacing: 5px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }


input[type="text"],input[type="password"]
{
    border: none;
    background-color: rgb(5, 5, 5, 0);
    height: 40px;
    width:100%;
    outline: none;
    border-bottom:1px solid #fff;
    font-size: 20px;
    color: white;
  text-shadow: 2px 2px 4px #000000;
}

#submit
{
    display: inline-block;
            background-color: rgb(0, 0, 0,.5);
            color: #ebf7f6;
            height: 43px;
            width: 50%;
            font-size: 24px;
            border: 1px solid;
            padding: 10px;
            cursor: pointer;
            box-shadow: 5px 5px 3px rgb(8, 24, 44);
            margin-top: 5%;
            margin-left: 25%;
            outline: none;
}
#submit:hover {
            background-color: #091616;
            color: rgb(195, 203, 212);
        }

        #submit:active {
            background-color: rgb(24, 14, 14,.6);
            color: #d5e6e4;
            box-shadow: 0px 2px rgb(2, 41, 88);
            transform: translateY(2px);
            outline: none;
        }
        .form a
        {
            text-decoration: none;
            font-size: 12px;
            line-height: 20px;
            color: rgb(205, 236, 235);
        }
        footer
{
    position: absolute;
    height: 10vh;
    width: 100%;
}

.foot
{
    background-color: #000;
    height: 100%;
    width: 100%;
    margin: 0;
}
.foot p
{
    margin-left: 42%;
    color: white;
    font-size: 1.3em;
  text-shadow: 2px 2px 4px rgb(53, 214, 53);
}
.foot a
{
    margin-left: 49%;
    color: white;
    font-size: 1.3em;
    position: absolute;
    margin-top: -1%;
}

    </style>
    </head>
    <body>
        <header >
            <div class="nav1">
                <div class="nav2">
                    <img src="logo.jpg" class="logo">
                    <li>
                        <a href="index.php">HOME</a>
                    </li>
                    <li>
                        <a href="sign.php" class="active">SIGNUP</a>
                    </li>
                    <li>
                        <a href="login.php">LOGIN</a>
                    </li>
                </div>
            </div>
        </header>
        <main>
            <div class="form">
                <img class="avatar" src="avatar.png">
                <form name="form1" onsubmit="return validate()"  id="form1" method="POST" action="sign.php">
                    <p>Username (*):</p>
                    <input type="text" name="user" minlength="1" maxlength="30" placeholder="Enter your Username here"
                        required>
                    <p>Email id (*):</p>
                    <input type="text" name="mail"
                        pattern="[a-zA-z]{1,}[.]{0,1}[a-zA-z0-9]{0,}[@][a-z]{1,10}[.][a-zA-z]{2,3}"
                        placeholder="Enter your valid email-id" required>
                        <p>Password (*):</p>
                        <input type="password" name="pass1" minlength="8" maxlength="20" placeholder="Enter a strong Password"
                            required>
                        <p>Confirm Password (*):</p>
                        <input type="password" name="pass2" minlength="8" maxlength="20" placeholder="Enter the above Password"
                            required>
                        <input type="submit" name="" value="Sign Up" id="submit">
                </form>
            </div>
        </main>
        <footer>
            <div class="foot">
                <p>Copyright © 2020 BinaryMaze</p>
              <a href="https://github.com/Jas-077/DSA_Project.git" target="_blank">
                <i class="fa fa-github" style="color: rgb(53, 228, 53);font-size: 1.8em;"></i>
                </a>
            </div>
        </footer>
    </body>
</html>
<script>
    function validate() {
        var x = document.forms["form1"]["pass1"].value;
        var y = document.forms["form1"]["pass2"].value;
        var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
        if (strongRegex.test(x)) {
            if (x != y) {
                alert("Pls Enter the correct password in Confirm password option");
                return false;
            }
        }
        else {
            alert("The entered Password is not strong enough");
            return false;
        }
    }
</script>