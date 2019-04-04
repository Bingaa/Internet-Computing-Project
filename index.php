<?php
include_once('include/config.php');
include 'include/functions.php';
$connection = getDB(DBHOST, DBUSER, DBPASS, DBNAME); 
session_start();
if(isset($_SESSION["id"])){ 
    header("Location: html/messages.php");
}
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
            
            //bind here

            $querybuilder = "SELECT * FROM user WHERE UserName=?";
            $stmt = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt,$querybuilder)){
                echo "SQL Statement failure";
            }else{
                mysqli_stmt_bind_param($stmt,"s", $userName);
                //run param inside database
                mysqli_stmt_execute($stmt);
                $results = mysqli_stmt_get_result($stmt);
            }
            $result = mysqli_fetch_assoc($results);
            
            //old working code
            // $query = "SELECT * FROM User WHERE UserName = '" .$userName ."'"; 
            // $results = runQuery($connection, $query);  

            

            if(empty($result["UserID"])){ 
                echo "<p> Invalid UserName </p>";
            } 
            else if (!password_verify($password,$result["Password"])){
                echo "<p> Invalid Pass </p>";
            }
            else { 
                $_SESSION["id"] = $result["UserID"]; 
                $_SESSION["fullName"] = $result["FirstName"] . " " . $result["LastName"];
                echo header("Location: html/messages.php");
            }
        }
        ?>
        <p><a href="html/forgotPassword.html">Forgot Password?</a></p>
    </div>

    <div class="white-card" style="margin-top: 10px;">
        <p>Don't have an account? <a href="html/signUp.html">Sign Up</a></p>
    </div>

</body>
