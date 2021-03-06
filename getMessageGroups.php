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
    $groups = []; 
    $latestTimes = []; 
    $updatedGroups = []; 
    $i=0; 
    $groupInfo = runQuery($chattime, $groupQuery);
    while ($row = mysqli_fetch_assoc($groupInfo)){//While loop-all groups that user is associated with
        $groupDetailsQuery = "SELECT * FROM `group` WHERE GroupID=".$row['GroupID']." LIMIT 1";
        array_push($groups,$row["GroupID"]); //Get all groups 
        $groupDetails = runQuery($chattime, $groupDetailsQuery);
        $row2 = mysqli_fetch_assoc($groupDetails);//get group details from Group Table, there should only be 1 because GroupID is unique
        $latestmessageQuery = "SELECT * FROM `Message` WHERE GroupID=".$row['GroupID']." ORDER BY CreateDate DESC LIMIT 1" ; //get latest message in coversation
        $latestmessage= runQuery($chattime,$latestmessageQuery);
        $row3 = mysqli_fetch_assoc($latestmessage);
        array_push($latestTimes, $row3["CreateDate"]);
        $row2['Groupname'] = str_replace($_SESSION["fullName"] . ", ", " " ,$row2["Groupname"]);
        $row2['Groupname'] = str_replace( ", " . $_SESSION["fullName"], " " ,$row2["Groupname"]);

        $updatedGroups[$i] = new stdClass(); 
        $updatedGroups[$i]->time = $row3['CreateDate'];
        $updatedGroups[$i]->msg = $row3['Content'] ;
        $updatedGroups[$i]->groupID = $row['GroupID'];
        $updatedGroups[$i]->groupName = $row2['Groupname'];
        $updatedGroups[$i]->groupImage = $row2['GroupImage'];

        $i = $i + 1; 
    }
    function comparator($object1, $object2){ 
        return $object1->time < $object2->time;
    }
    usort($updatedGroups, 'comparator');
    foreach($updatedGroups as $group){ 
        echo "<tr > ";
        echo "<td class='chatSel' id='" . $group->groupID. "'>";
        echo "<img id='profile' src='" . $group->groupImage . "'>";
        echo "<h4 id='name'>" . $group->groupName . "</h4>";
        echo "<p class='timestamp'>" . substr($group->time,11,5) . "</p>"; 
        echo "<p>" . $group->msg . "</p>";
        echo "</td>";
        echo "</tr>";
    }

    $_SESSION["groups"] = $groups; 
    $_SESSION["latestTimes"] = $latestTimes; 

?>