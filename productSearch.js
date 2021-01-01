
function searchProducte() {

    $('.productsearch').keydown(search);
    function search() {
        $('.productsearch').keyup(function () {
            // console.log($(this).val());
            $.post('productSearch.php', {
                search: $(this).val()
            }, function (data) {
                $('.dropme').html('');
                $('.dropme').html(data);
                $('.product-list').click(displayProduct);
                // console.log(data);
            });
        })

        // var sa=document.getElementById('item-search');
        // var sa=document.getElementById('select');
        // console.log(sa.value);
        // $.post('checks.php',{
        // ID: sa.value
        // },function(data){
        //     console.log('received');
        // });
    }
    function displayProduct() {
        $('.dropme').html('');
        // console.log($(this)[0].id);
        $.post('searchProducte.php', {
            displaysearch: $(this)[0].id
        }, function (data) {
            $('.lastProduct').html('');
            $('.lastProduct').html(data);
            $('.buy').click(function () {
                var orderProducts = [];
                $("#bill tr").each(function () {
                    orderProducts.push($(this).attr("id"));
                })
                if (orderProducts.includes($(this).attr('id'))) {
                    alert("You have already added this item");
                } else {

                    orderProducts.push($(this).attr('id'));
                    $.ajax({
                        type: 'GET',
                        url: "add-home-user.php",
                        data: 'id=' + $(this).attr('id'),
                        success: function (response) {
                            $('#bill').append(response);

                        }

                    });

                    var totalOrder = 0;
                    $(".order-product-quantity-input").each(function () {
                        totalOrder += $(".order-product-quantity-input").next().val() * $(".order-product-quantity-input").val();
                        console.log($(".order-product-quantity-input").next().val());
                        console.log($(".order-product-quantity-input").val());
                    })
                    $(".totalPrice").html(totalOrder + " EGP");
                    console.log($(this).parent().parent().children('span :eq(2)').html());
                }
            });
        })
    }
}
$('.productsearch').focus(searchProducte);
$('.productsearch').blur(allProduct);
function allProduct() {
    
    // $('.dropme').html('');
    // displayProducts.php
    // console.log('hi');
    $.post('displayProducts.php', {
        displaysearch: $(this)[0].id
    }, function (data) {
        $('.lastProduct').html('');
        $('.lastProduct').html(data);
        $('.buy').click(function () {
            var orderProducts = [];
            $("#bill tr").each(function () {
                orderProducts.push($(this).attr("id"));
            })
            if (orderProducts.includes($(this).attr('id'))) {
                alert("You have already added this item");
            } else {

                orderProducts.push($(this).attr('id'));
                $.ajax({
                    type: 'GET',
                    url: "add-home-user.php",
                    data: 'id=' + $(this).attr('id'),
                    success: function (response) {
                        $('#bill').append(response);

                    }

                });

                var totalOrder = 0;
                $(".order-product-quantity-input").each(function () {
                    totalOrder += $(".order-product-quantity-input").next().val() * $(".order-product-quantity-input").val();
                    console.log($(".order-product-quantity-input").next().val());
                    console.log($(".order-product-quantity-input").val());
                })
                $(".totalPrice").html(totalOrder + " EGP");
                console.log($(this).parent().parent().children('span :eq(2)').html());
            }
        });
    });
    setTimeout(clearDropdown,200);
}
function clearDropdown(){
$('.dropme').html('');
}
// function displayInfo(){


// }