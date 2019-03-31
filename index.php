<?php
include_once('include/config.php');
include 'include/functions.php';
$connection = getDB(DBHOST, DBUSER, DBPASS, DBNAME); 
?>
<!DOCTYPE html>

<head> 
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body> 
    <div class="white-card" style="margin-top: 100px;">
        <img src= "images/Logo.PNG">
        <form action="index.php" method="post"> 
            <input type="text" name="userName" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" value="Login">Login</button>
        </form>
        <?php 
        if(isset($_POST["userName"]) && isset($_POST["password"])){ 
            $userName = $_POST["userName"]; 
            $password = $_POST["password"]; 
            $query = "SELECT UserID FROM User WHERE UserName = '" .$userName ."' AND Password ='" .$password ."'"; 
            $results = runQuery($connection, $query);  
            $id = mysqli_fetch_assoc($results)["UserID"];   
            if(empty($id)){ 
                echo "<p> Invalid UserName or Password</p>";
            } else { 
                session_start(); 
                $_SESSION["id"] = $id; 
                header("Location: html/messages.html");
            }
        }
        ?>
        <p><a href="html/forgotPassword.html">Forgot Password?</a></p>
    </div>

    <div class="white-card" style="margin-top: 10px;">
        <p>Don't have an account? <a href="html/signUp.html">Sign Up</a></p>
    </div>

</body>
