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
    $updatedGroups = []; 
    $i = 0; 
    while ($row = mysqli_fetch_assoc($groupInfo)){//While loop-all groups that user is associated with
        $groupDetailsQuery = "SELECT * FROM `group` WHERE GroupID=".$row['GroupID']." LIMIT 1";
        $groupDetails = runQuery($chattime, $groupDetailsQuery);
        $row2 = mysqli_fetch_assoc($groupDetails);//get group details from Group Table, there should only be 1 because GroupID is unique
        $latestmessageQuery = "SELECT * FROM `Message` WHERE GroupID=".$row['GroupID']." ORDER BY CreateDate DESC LIMIT 1" ; //get latest message in coversation
        $latestmessage= runQuery($chattime,$latestmessageQuery);
        $row3 = mysqli_fetch_assoc($latestmessage);

        $row2['Groupname'] = str_replace($_SESSION["fullName"] . ", ", " " ,$row2["Groupname"]);
        $row2['Groupname'] = str_replace( ", " . $_SESSION["fullName"], " " ,$row2["Groupname"]);


        if(count($_SESSION["groups"]) > $i && $_SESSION["groups"][$i] == $row['GroupID']){ 
            if($_SESSION["latestTimes"][$i] != $row3['CreateDate']){ 
                $updatedGroups[$i] = new stdClass(); 
                $updatedGroups[$i]->time = $row3['CreateDate'];
                $updatedGroups[$i]->msg = $row3['Content'] ;
                $updatedGroups[$i]->groupID = $row['GroupID'];
                $updatedGroups[$i]->groupName = $row2['Groupname'];
                $updatedGroups[$i]->groupImage = $row2['GroupImage'];

                $_SESSION["latestTimes"][$i] = $row3['CreateDate'];
            }
        } else if($row3['CreateDate']){ 
            $updatedGroups[$i] = new stdClass(); 
            $updatedGroups[$i]->time = $row3['CreateDate'];
            $updatedGroups[$i]->msg = $row3['Content'] ;
            $updatedGroups[$i]->groupID = $row['GroupID'];
            $updatedGroups[$i]->groupName = $row2['Groupname'];
            $updatedGroups[$i]->groupImage = $row2['GroupImage'];
            array_push($_SESSION["groups"],$row['GroupID']);
            array_push($_SESSION["latestTimes"],$row3['CreateDate']);
        }
        

        
        $i = $i + 1; 

    }

    function comparator($object1, $object2){ 
        return $object1->time > $object2->time;
    }
    usort($updatedGroups, 'comparator');
    echo json_encode($updatedGroups);
?>