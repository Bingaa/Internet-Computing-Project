<?php
    //Query UserGroup for Groups associated with UserID
    include_once('include/config.php');
    include_once('include/functions.php');
    session_start();
    $q = "SET CHARACTER SET utf8mb4";
    $chattime = getDB(DBHOST, DBUSER, DBPASS, DBNAME); 
    runQuery($chattime, $q);
    $currentUser = $_SESSION["id"]; 
    $groupQuery = "SELECT * FROM UserGroup WHERE UserID=".$currentUser;
    
    $groupInfo = runQuery($chattime, $groupQuery);
    while ($row = mysqli_fetch_assoc($groupInfo)){//While loop-all groups that user is associated with
        $groupDetailsQuery = "SELECT * FROM `group` WHERE GroupID=".$row['GroupID']." LIMIT 1";
        $groupDetails = runQuery($chattime, $groupDetailsQuery);
        $row2 = mysqli_fetch_assoc($groupDetails);//get group details from Group Table, there should only be 1 because GroupID is unique
        $latestmessageQuery = "SELECT * FROM `Message` WHERE GroupID=".$row['GroupID']." ORDER BY CreateDate DESC LIMIT 1" ; //get latest message in coversation
        $latestmessage= runQuery($chattime,$latestmessageQuery);
        $row3 = mysqli_fetch_assoc($latestmessage);

        $row2['Groupname'] = str_replace($_SESSION["fullName"] . ", ", " " ,$row2["Groupname"]);
        $row2['Groupname'] = str_replace( ", " . $_SESSION["fullName"], " " ,$row2["Groupname"]);
    
        echo "<tr > ";
        echo "<td class='chatSel' id='" . $row['GroupID'] . "'>";
        echo "<img id='profile' src='" . $row2['GroupImage'] . "'>";
        echo "<h4 id='name'>" . $row2['Groupname'] . "</h4>";
        echo "<p class='timestamp'>" . substr($row3['CreateDate'],11,5) . "</p>"; 
        echo "<p>" . $row3['Content'] . "</p>";
        echo "</td>";
        echo "</tr>";

    }
  
?>