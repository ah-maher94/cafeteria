$(document).ready(function(){

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



});

