<?php

session_start();
    
require_once("config.php");

if(isset($_POST["categoryName"])){
    $categoryName = $_POST["categoryName"];

    // Insert New Category
    $selectProduct = "insert into category (categoryName) 
                        values (?)";
    $stmt = $db->prepare($selectProduct);
    $res = $stmt->execute([$categoryName]);

    // Refresh List
    $selectCategories = "select * from category";
    $stmt = $db->prepare($selectCategories);
    $res = $stmt->execute();
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<label for='new-product-category'>Category</label>
    <select class='custom-select' id='new-product-category' name='category' aria-describedby='validationServer04Feedback' required>
      <option selected disabled value=''>Choose...</option>";
    
           foreach($rows as $row){
               echo "<option value='".$row['categoryId']."'>".$row['categoryName']."</option>";
           }
    
    echo "</select>
    <div id='validationServer04Feedback' class='invalid-feedback'>
      Please select a valid Category..
    </div>";

}
else{
    echo "Enter valid Name";
}



?>
