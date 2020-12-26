<?php

session_start();
    
require_once("config.php");


if(isset($_GET["id"])){
    $userId = $_GET["id"];
    $selectUser = "select `userId`, `userName`, `roomNumber`, `userExt` from users u, room r where u.roomId = r.roomId and userId = ?";
    $stmt = $db->prepare($selectUser);
    $res = $stmt->execute(array($userId));
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($rows as $col){

        ?>
        <div class='form-group'>
            <input type='hidden' class='form-control' name='userId' id='edit-user-id' value=' <?php echo $col["userId"]?> '>
        </div>
        <div class='form-group'>
            <label for='edit-user-name' class='col-form-label'>Name</label>
            <input type='text' class='form-control' name='userName' id='edit-user-name' value=' <?php echo $col["userName"]?> '>
            <div class="valid-feedback">
            Looks good!
            </div>
            <div class="invalid-feedback">
            Please enter a valid name.
            </div>
        </div>
        <div class='form-group'>
            <label for='edit-user-room' class='col-form-label'>Room No.</label>
            <input type='text' class='form-control' name='userRoom' id='edit-user-room' value=' <?php echo $col["roomNumber"]?> '>
            <div class="valid-feedback">
            Looks good!
            </div>
            <div class="invalid-feedback">
            Please select valid room.
            </div>
        </div>
        <?php

        echo "<div class='form-group'>
            <label for='edit-user-ext' class='col-form-label'>Ext.</label>
            <input type='number' class='form-control' name='userExt' id='edit-user-ext' value='".$col['userExt']."'>
            <div class='valid-feedback'>
               Looks good!
               </div>
               <div class='invalid-feedback'>
               Please select valid room.
               </div>
        </div></div>
               ";

    }

}

?>
