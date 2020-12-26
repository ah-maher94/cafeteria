<?php

    session_start();
    
    require_once("config.php");
    
    
    if(isset($_GET["id"])){
        $userId = $_GET["id"];
        $selectUser = "select `userId`, `userName` from users where userId = ?";
        $stmt = $db->prepare($selectUser);
        $res = $stmt->execute(array($userId));
        $rows= $stmt->fetch(PDO::FETCH_ASSOC);

        echo "Are you sure you want to delete <h4 style='display:inline'><span class='badge badge-primary '>".$rows['userName']."</span></h4>?<input type='hidden' name='userId' id='user-id' value='".$rows['userId']."'>";

    }    



?>