<!DOCTYPE html>

<head> 
    <meta charset='utf-8'>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
    <link rel="stylesheet" type="text/css" href="../styles/search.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../scripts/search.js"></script>  
</head>

<body> 
    <div class="topnav">
        <img src="../images/LogoHorizontal.PNG" style="float:left; width:150px; height:60px; ">
        <a href="../logOut.php"><i class="fas fa-sign-out-alt" title="Sign Out"></i></a>
        <a href="profile.php"><i class="fa fa-fw fa-user" title="Profile"></i></a>
        <a class="active" href="search.php"><i class="fa fa-fw fa-search" title="Search for Contacts"></i></a> 
        <a href="messages.php"><i class="fas fa-comment" title="Messages"></i></a> 
    </div>
    <div class="white-card" style="margin-top: 50px;">
        
        <h2>Search</h2>
        <p>Find your friends and family that you wish to get in contact with!</p>
        <input type="text" id="search" placeholder="Search" onKeyUp="searchContacts(this.value);">

        <div id="contactList"> 

        </div>

    </div>

  

</body>
