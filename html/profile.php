<?php
require_once '../include/config.php';
include '../include/functions.php';
session_start();


//your code for connecting to database, etc. goese here
// Create connection

$connection = getDB(DBHOST, DBUSER, DBPASS, DBNAME);
$myid=$id = $_SESSION["id"] ;
$editable = true;
$added=false;

$message = "";
if(isset($_GET["profileId"])){
  if ($_SESSION["id"]!=$_GET["profileId"]){
    $id = $_GET["profileId"] ;
    $myid= $_SESSION["id"];
    $query = "SELECT * FROM Contacts WHERE Contacts.UserID = $myid"; //check if thier friends already
    $result = runQuery($connection, $query); 
    $row = mysqli_fetch_array($result);
    if(strpos($row["ContactID"],$id)!== false){
      $added=true;
    }
    $editable = false;
  }
}
if(isset($_POST["save"])){ 
    $targetdir = '../images/profiles/';
  

  if($editable){
    if(isset($_POST['job'])){
      $job=$_POST['job'];
    }
    if(isset($_POST['status'])){
      $status=$_POST['status'];
    }
    if(isset($_POST['location'])){
      $location=$_POST['location'];
    }
    if(isset($_POST['birthday'])){
      $birthday=$_POST['birthday'];
    }
    if(isset($_POST['interests'])){
      $interests=$_POST['interests'];
    }
    if(isset($_FILES["photoFile"])){
      $targetfile = $targetdir.$_FILES['photoFile']['name'];
      $ext = pathinfo($_FILES['photoFile']['name'], PATHINFO_EXTENSION);
      if (move_uploaded_file($_FILES['photoFile']['tmp_name'], $targetfile)) {
        rename($targetdir.$_FILES['photoFile']['name'], $targetdir. $_SESSION["id"]. "." .$ext);
        $fname= $targetdir. $_SESSION["id"] . "." .$ext;
      } else { 
        $fname = "";
      }
   }

   if($fname != ""){ //bind here

    $querybuilder="UPDATE user SET Job=?, Status=?, Location=?, Birthday=?, Interests=?, Image='$fname' WHERE UserID = $id;";

    //  $query="UPDATE user SET Job='$job', Status='$status', Location='$location', Birthday='$birthday', Interests='$interests', Image='$fname' WHERE UserID = $id;";
   } else { 
    $querybuilder="UPDATE user SET Job=?, Status=?, Location=?, Birthday=?, Interests=? WHERE UserID = $id;";

    // $query="UPDATE user SET Job='$job', Status='$status', Location='$location', Birthday='$birthday', Interests='$interests' WHERE UserID = $id;";
   }
   
    
      if(isset($_POST['save'])){


        // $result = runQuery($connection, $query);
      $stmt = mysqli_stmt_init($connection);
      if (!mysqli_stmt_prepare($stmt,$querybuilder)){
          echo "SQL Statement failure";
      }else{
          mysqli_stmt_bind_param($stmt,"sssss", $job, $status, $location, $birthday, $interests);
          //run param inside database
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
      }
      $message =  "Saved!";
  
    }
  }else if (!$added){
    $query="INSERT INTO contacts VALUES ($myid,$id);";
    if(isset($_POST['save'])){
      $result = runQuery($connection, $query);
      $message =  "Contact Added!";
    }
  }
}
$fname=$job=$location=$birthday=$interests=$status="";

$query = "SELECT * FROM user WHERE user.UserID = $id";
$result = runQuery($connection, $query); 
$row = mysqli_fetch_array($result);

?>

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
        <a href="../logOut.php"><i class="fas fa-sign-out-alt" title="Sign Out"></i></a>
        <a class="active" href="profile.php"><i class="fa fa-fw fa-user" title="Profile"></i></a>
        <a href="search.php"><i class="fa fa-fw fa-search" title="Search for Contacts"></i></a> 
        <a href="messages.php"><i class="fas fa-comment" title="Messages"></i></a> 
    </div>

    <div class="white-card-wide" style="margin-top: 50px;">        
        <img id="profile" class="display-pic" src=<?php echo $row["Image"];?>>
    
        <div class="info">
        <?php echo "<h2>".$row["FirstName"]." ".$row["LastName"]."</h2>"?>            
            <form enctype="multipart/form-data" action=<?php if($editable){echo "profile.php";}else{echo "profile.php?profileId=".$id;} ?> method="post">
            <?php
              $query = "SELECT * FROM user WHERE user.UserID = $id";
              $result = runQuery($connection, $query); 
              $row = mysqli_fetch_array($result);
            ?>
            
            <table>
              <tr> 
                <td><p>Status: </p></td>
                <td><input value =<?php echo "'" .$row["Status"] . "'"?> name="status"  type="text"<?php if(!$editable){echo "readOnly";}?>></td>
              </tr>
              <tr> 
                <td><p>Job: </p></td>
                <td><input value =<?php echo "'" .$row["Job"] . "'"?> name="job" type="text"<?php if(!$editable){echo "readOnly";}?>></td>
              </tr>
              <tr> 
                <td><p>Location: </p></td>
                <td><input value =<?php echo "'" .$row["Location"] . "'"?> name="location" type="text"<?php if(!$editable){echo "readOnly";} ?>></td>
              </tr>
              <tr> 
                <td><p>Birthday: </p></td>
                <td><input value =<?php echo "'" .substr($row["Birthday"],0,10). "'"?> name="birthday" type="date"<?php if(!$editable){echo "readOnly";}?> ></td>
              </tr>
              <tr> 
                <td><p>Interests: </p></td>
                <td><input value =<?php echo "'" .$row["Interests"] . "'"?> name="interests" type="text"<?php if(!$editable){echo "readOnly";}?> ></td>
              </tr>
            </table>
              <button type="submit" name="save" <?php if($added){echo "style='display: none;'";} ?>><?php if(!$added && !$editable){echo "Add Contact";}else{echo "Save";}  ?></button>
              <div id="myModal" class="modal">
          <div class="modal-content">
            <h2>Change Profile Picture</h2>
            
            <div class="upload-btn-wrapper">
              <button class="btn-upload"><h3>Upload Photo</h3></button>
              <input type="file" id="photoFile" name="photoFile" accept="image/*" onchange="uploadPhoto(this);" />
            </div>
          </div>
        </div>
        </form>   
        <?php 
          echo $message;
          ?>   
        </div>

 
      

    </div>
    

</body>
