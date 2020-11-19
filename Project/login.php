<?php
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: input.html");
    exit;
}
 
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
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM user WHERE username = ?";
        $username=$_POST["user"];
        $password=$_POST["pass1"];
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password,$hashed_password))
                        {
                            // Password is correct, so start a new session
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: input.html?successfull");
                        } 
                        else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                            echo '<script>
                            alert("Wrong password entered");
                            </script>';
                            $_SESSION = array();
 
                             // Destroy the session.
                            session_destroy(); 
                        }
                    }
                }
                 else
                 {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                    echo '<script>
                            alert("No account found with that username.");
                            </script>';
                            $_SESSION = array();
 
                            // Destroy the session.
                           session_destroy(); 
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
}


    ?>
<html lang="en">
    <head>
    <title>Login</title>
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
                        <a href="sign.php">SIGNUP</a>
                    </li>
                    <li>
                        <a href="login.php" class="active">LOGIN</a>
                    </li>
                </div>
            </div>
        </header>
        <main>
            <div class="form">
                <img class="avatar" src="avatar.png">
                <form name="form1" onsubmit="return validate()"  id="form1" method="POST" action="login.php">
                    <p>Enter Username (*):</p>
                    <input type="text" required minlength="1" placeholder="Enter Username" name="user">
                    <p>Enter Password (*):</p>
                    <input type="password" required placeholder="Enter Password" minlength="8" maxlength="20" name="pass1">
                    <p>Captcha :</p>
                <div id="Cap">
                    <p></p>
                </div>
                <p>Enter Captcha (*):</p>
                <input type="text" name="cap" minlength="1" maxlength="7" pattern="[0-9a-zA-Z]{1,7}"
                    placeholder="Enter the Captcha here" required><br>
                    <input type="submit" id="submit" value="Login">
                </form>
                <br>
                <a href="signup.html">Dont have an Account? Sign up</a><br>
            </div>
        </main>
        <footer>
            <div class="foot">
                <p>Copyright © 2020 BinaryMaze</p>
              <a href="https://github.com/Jas-077/SE_Project.git" target="_blank">
                <i class="fa fa-github" style="color: rgb(53, 228, 53);font-size: 1.8em;"></i>
                </a>
            </div>
        </footer>
    </body>
</html>
<script>
    var x = document.getElementById("Cap");
    var t = "";
    var z = Math.floor((Math.random() * (8 - 6)) + 6);
    var ran = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    for (var i = 0; i < z; i++) {
        t += ran[Math.floor(Math.random() * ran.length)];
    }
    x.innerHTML = t;
    function validate() {
        var a = document.forms["form1"]["cap"].value;
        if (a === t)
        {
           ;
        }
        else {
            alert("Pls Re enter the Caption");
            return false;
        }
    }
</script>
