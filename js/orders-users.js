$(document).ready(function(){

    // Check Login
    $(".logout").click(function () {
        $.post('checkCookies.php',{
            cook: 'delete'
        },function(){
           window.location.replace("login.php");
        });
    })

    // Filter Orders By Date
    $.datepicker.setDefaults({
        dateFormat: 'yy-mm-dd'
    });
    $(function(){
        $("#from-date").datepicker();
        $("#to-date").datepicker();
    });
    $('#filter-orders').click(function(event){
        event.preventDefault();
        var fromDate = $("#from-date").val();
        var toDate = $("#to-date").val();
        if(fromDate == ""){
            $("#from-date").addClass("is-invalid");
        }if(toDate == ""){
            $("#to-date").addClass("is-invalid");
        }else{
            $("#from-date").removeClass("is-invalid");
            $("#to-date").removeClass("is-invalid");

            $.ajax({
                method: "POST",
                url: "filter-orders.php",
                data: {'from-date':fromDate,
                       'to-date':toDate},
                success: function(response){
                    $(".orders-container").html(response);
                }
            });
        }

        console.log(fromDate);
    });

    // Display Order Details
    $(".displayOrder").click(function(){

        $.ajax({
            type: 'GET',
            url: 'display-order-details.php',
            data: 'id=' + $(this).attr("id"),
            success: function(order){
                $("#selectedOrder").html(order);
            }
        });

    });


    // Validate Product Info
    $("#insertProduct").click(function(){

        var valid = true;
        var validImage = validate($("#new-product-pic").val());


        if($("#new-product-name").val() == ""){
            $("#new-product-name").addClass("is-invalid")
            $("#new-product-name").removeClass("is-valid")
            valid= false;
        }else{
            $("#new-product-name").removeClass("is-invalid")
            $("#new-product-name").addClass("is-valid")
        }
        if($("#new-product-price").val() == ""){
            $("#new-product-price").addClass("is-invalid")
            $("#new-product-price").removeClass("is-valid")
            valid= false;
        }else{
            $("#new-product-price").removeClass("is-invalid")
            $("#new-product-price").addClass("is-valid")
        }
        if($("#new-product-category").val() == ""){
            $("#new-product-category").addClass("is-invalid")
            $("#new-product-category").removeClass("is-valid")
            valid= false;
        }else{
            $("#new-product-category").removeClass("is-invalid")
            $("#new-product-category").addClass("is-valid")
        }
        if($("#new-product-availability").val() == ""){
            $("#new-product-availability").addClass("is-invalid")
            $("#new-product-availability").removeClass("is-valid")
            valid= false;
        }else{
            $("#new-product-availability").removeClass("is-invalid")
            $("#new-product-availability").addClass("is-valid")
        }
        if($("#new-product-pic").val() == "" || validImage == false){
            $("#new-product-pic").addClass("is-invalid")
            $("#new-product-pic").removeClass("is-valid")
            valid= false;

        }else{
            $("#new-product-pic").removeClass("is-invalid")
            $("#new-product-pic").addClass("is-valid")
        }

        if(valid == true){
            $("#addProductForm").submit();
        }


    });







    // Edit Product - Modal
    $(".editProduct").click(function(){
        $.ajax({
            type: 'GET',
            url: 'edit-product.php',
            data: 'id=' + $(this).attr("id"),
            success: function(response){
                $(".editProductModalBody").html(response);
                $("#editProductModal").modal("show");
            }
        });
    });


    // Update Product
    $(".updateProduct").click(function(event){


        event.preventDefault();
        var valid = true;

        if( ($("#edit-product-name").val()).trim() == "" ){
            $("#edit-product-name").addClass("is-invalid")
            $("#edit-product-name").removeClass("is-valid")
            valid= false;
        }else{
            $("#edit-product-name").removeClass("is-invalid")
            $("#edit-product-name").addClass("is-valid")
        }
        if($("#edit-product-price").val() == "" || isNaN( $("#edit-product-price").val() ) ){
            $("#edit-product-price").addClass("is-invalid")
            $("#edit-product-price").removeClass("is-valid")
            valid= false;
        }else{
            $("#edit-product-price").removeClass("is-invalid")
            $("#edit-product-price").addClass("is-valid")
        }


        if(valid == true){
            $("#updateProductForm").submit();
        }


    });


    // Confirm Delete Product - Modal
    $(".confirmDeleteProduct").click(function(){
        $.ajax({
            type: 'GET',
            url: 'confirm-delete-product.php',
            data: 'id=' + $(this).attr("id"),
            success: function(response){
                $(".deleteProductModalBody").html(response);
                $("#deleteProductModal").modal("show");
            }
        });
    });


    // Delete Product
    $(".deleteProduct").click(function(){
        $.ajax({
            type: 'POST',
            url: 'delete-product.php',
            data: {
                'productId': $("#product-id").val(),
            }
        });

    });


    // Add New Product
    $("#newProduct").click(function(){
        location.href = "./add-product.php";
    });


    // Add New Category
    $("#addCategory").click(function(){
        $("#insertCategoryModal").modal("show");
        $(".valid-feedback-new-category").css({
            'display': 'none'
        });
        $('#new-category-name').val(""); // Empty input field
    });  


    // Insert New Category & Refresh List
    $("#insertCategory").click(function(){

        if($("#new-category-name").val() != ""){
        $.ajax({
            type: 'POST',
            url: 'insert-category.php',
            data: {'categoryName': $("#new-category-name").val()},
            success: function(newCategories){
                $(".categories").html(newCategories);
                $("#insertCategoryModal").modal("hide");
                $(".valid-feedback-new-category").css({
                    'display': 'none'
                });
            }
        });

        }else{          // Display Error msg
            $(".valid-feedback-new-category").css({
                'display': 'block',
                'color': 'red'
        });
    }

    });


    // Check Add User Data
    $("#insertUser").on('click', function(event){
        var patternName = /^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$/;
        var patternEmail = /^[0-9a-zA-Z]+([0-9a-zA-Z]*[-._+])*[0-9a-zA-Z]+@[0-9a-zA-Z]+([-.][0-9a-zA-Z]+)*([0-9a-zA-Z]*[.])[a-zA-Z]{2,6}$/;
        var patternPassword = /^([a-zA-Z0-9@*#]{8,30})$/;
        var valid = true;
        var validImage = validate($("#new-user-pic").val());
        // console.log($("#new-user-pic").val());

        if($("#new-user-name").val() == "" || !( patternName.test($("#new-user-name").val()) )){
            $("#new-user-name").addClass("is-invalid")
            $("#new-user-name").removeClass("is-valid")
            valid= false;
        }else{
            $("#new-user-name").removeClass("is-invalid")
            $("#new-user-name").addClass("is-valid")
        }
        if($("#new-user-email").val() == "" || !( patternEmail.test($("#new-user-email").val()) ) ){
            $("#new-user-email").addClass("is-invalid")
            $("#new-user-email").removeClass("is-valid")
            valid= false;
        }else{
            $("#new-user-email").removeClass("is-invalid")
            $("#new-user-email").addClass("is-valid")
        }
        if($("#new-user-password").val() == "" || !( patternPassword.test($("#new-user-password").val()) ) ){
            $("#new-user-password").addClass("is-invalid")
            $("#new-user-password").removeClass("is-valid")
            valid= false;
        }else{
            $("#new-user-password").removeClass("is-invalid")
            $("#new-user-password").addClass("is-valid")
        }
        if($("#new-user-confirm").val() != $("#new-user-password").val() || $("#new-user-confirm").val() == "" ){
            $("#new-user-confirm").addClass("is-invalid")
            $("#new-user-confirm").removeClass("is-valid")
            valid= false;
        }else{
            $("#new-user-confirm").removeClass("is-invalid")
            $("#new-user-confirm").addClass("is-valid")
        }
        if($("#user-room-num").val() == ""){
            $("#user-room-num").addClass("is-invalid")
            $("#user-room-num").removeClass("is-valid")
            valid= false;
        }else{
            $("#user-room-num").removeClass("is-invalid")
            $("#user-room-num").addClass("is-valid")
        }
        if($("#new-user-ext").val() == ""){
            $("#new-user-ext").addClass("is-invalid")
            $("#new-user-ext").removeClass("is-valid")
            valid= false;
        }else{
            $("#new-user-ext").removeClass("is-invalid")
            $("#new-user-ext").addClass("is-valid")
        }
        if($("#new-user-pic").val() == "" || validImage == false){
            $("#new-user-pic").addClass("is-invalid")
            $("#new-user-pic").removeClass("is-valid")
            valid= false;

        }else{
            $("#new-user-pic").removeClass("is-invalid")
            $("#new-user-pic").addClass("is-valid")
        }

        if(valid == true){
            $("#addUserForm").submit();
        }
    });



    // Edit Product - Modal
    $(".editUser").click(function(){
        $.ajax({
            type: 'GET',
            url: 'edit-user.php',
            data: 'id=' + $(this).attr("id"),
            success: function(response){
                $(".editUserModalBody").html(response);
                $("#editUserModal").modal("show");
            }
        });
    });


    // Update User
    $(".updateUser").click(function(event){
        event.preventDefault();
        var patternName = /^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$/;
        var valid = true;

        if( ($("#edit-user-name").val()).trim() == "" || !( patternName.test( ($("#edit-user-name").val()).trim()) ) ){
            $("#edit-user-name").addClass("is-invalid")
            $("#edit-user-name").removeClass("is-valid")
            valid= false;
        }else{
            $("#edit-user-name").removeClass("is-invalid")
            $("#edit-user-name").addClass("is-valid")
        }
        if($("#edit-user-room").val() == "" || isNaN( $("#edit-user-room").val() ) ){
            $("#edit-user-room").addClass("is-invalid")
            $("#edit-user-room").removeClass("is-valid")
            valid= false;
        }else{
            $("#edit-user-room").removeClass("is-invalid")
            $("#edit-user-room").addClass("is-valid")
        }
        if($("#edit-user-ext").val() == ""){
            $("#edit-user-ext").addClass("is-invalid")
            $("#edit-user-ext").removeClass("is-valid")
            valid= false;
        }else{
            $("#edit-user-ext").removeClass("is-invalid")
            $("#edit-user-ext").addClass("is-valid")
        }

        if(valid == true){
            $("#updateUserForm").submit();
        }
        
    });

    // Confirm Delete User - Modal
    $(".confirmDeleteUser").click(function(){
        $.ajax({
            type: 'GET',
            url: 'confirm-delete-user.php',
            data: 'id=' + $(this).attr("id"),
            success: function(response){
                $(".deleteUserModalBody").html(response);
                $("#deleteUserModal").modal("show");
            }
        });
    });


    // Delete User
    $(".deleteUser").click(function(){
        $.ajax({
            type: 'POST',
            url: 'delete-user.php',
            data: {
                'userId': $("#user-id").val(),
            }
        });

    });


});


// Validate Uploaded Image
var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];

function validate(uploadedImage) {
    // console.log(uploadedImage);
        var sFileName = uploadedImage;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
            }
                
                if (!blnValid) {
                    return false;
                }
  
    return true;
}