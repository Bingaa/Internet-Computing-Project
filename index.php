<!DOCTYPE html>

<head> 
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="scripts/signIn.js"></script>

</head>

<body> 
    <div class="white-card" style="margin-top: 100px;">
        <img src= "images/Logo.PNG">
        <form action="index.php" method="post"> 
            <input type="text" name="userName" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" value="Login">Login</button>
        </form>
        <p><a href="html/forgotPassword.html">Forgot Password?</a></p>
    </div>

    <div class="white-card" style="margin-top: 10px;">
        <p>Don't have an account? <a href="html/signUp.html">Sign Up</a></p>
    </div>

</body>
