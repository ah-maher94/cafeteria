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


});