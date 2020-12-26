$(document).ready(function(){

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
    $(".updateProduct").click(function(){
        var attributes = {
            'productId': $("#edit-product-id").val(),
            'productName': $("#edit-product-name").val(),
            'productPrice': $("#edit-product-price").val(),
            'productAvailability': $(".availability input[type='radio']:checked").val(),
        };

        $.ajax({
            type: 'POST',
            url: 'update-product.php',
            data: attributes,
        });

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
        if($("#new-user-pic").val() == ""){
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

});