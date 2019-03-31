

<!DOCTYPE html>

<head> 
    <meta charset='utf-8'>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../scripts/profile.js"></script>
</head>

<body> 
    <div class="topnav">
        <img src="../images/LogoHorizontal.PNG" style="float:left; width:150px; height:60px; ">
        <a href="../index.php"><i class="fas fa-sign-out-alt" title="Sign Out"></i></a>
        <a class="active" href="profile.php"><i class="fa fa-fw fa-user" title="Profile"></i></a>
        <a href="search.html"><i class="fa fa-fw fa-search" title="Search for Contacts"></i></a> 
        <a href="messages.html"><i class="fas fa-comment" title="Messages"></i></a> 
    </div>
    <div class="white-card-wide" style="margin-top: 50px;">        
        <img id="profile" class="display-pic" src="../images/error.png">
    
        <div class="info"><h2>FirstName LastName</h2>
            <h3 contenteditable="true" >Status</h3>

            <table>
              <tr> 
                <td><p>Job: </p></td>
                <td><input type="text"></td>
              </tr>
              <tr> 
                <td><p>Location: </p></td>
                <td><input type="text"></td>
              </tr>
              <tr> 
                <td><p>Birthday: </p></td>
                <td><input type="text"></td>
              </tr>
              <tr> 
                <td><p>Phone: </p></td>
                <td><input type="text"></td>
              </tr>
              <tr> 
                <td><p>Interests: </p></td>
                <td><input type="text"></td>
              </tr>
            </table>
            <button>Save</button>
        </div>

        <div id="myModal" class="modal">

            <div class="modal-content">
              <h2>Change Profile Picture</h2>
            
              <div class="upload-btn-wrapper">
                <button class="btn-upload"><h3>Upload Photo</h3></button>
                <input type="file" id="photoFile" accept="image/*" onchange="uploadPhoto(this);" />
              </div>
              <div class="upload-btn-wrapper">
                <button class="btn-remove" onclick="removePhoto(this);"><h3>Remove Photo</h3></button>
              </div>
            </div>
          
        </div>

    </div>

</body>