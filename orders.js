$(document).ready(function(){
    var trigger=0;
    var triggerid=0;
    var previuostrigger=0;
    $.post('orders.php',{
        userId: 1,
    },function(orders){
        $("#tables").html(orders);
        $(".orders").click(function(e){
            previuostrigger=triggerid;
            triggerid=$(this).attr("id");
            if(previuostrigger!=triggerid)
            {
                trigger++;
            }
            else{
                trigger=0;
                previuostrigger=0;
                triggerid=0;
            }
            $.ajax({
                type: 'GET',
                url: 'order-details/display-order-details.php',
                data: 'id=' + $(this).attr("id"),
                success: function(order){
                    var stringsub=order.split('</f>');
                    var id='#selectedOrder'+stringsub[1];
                    if(trigger==1)
                    {
                        $(`${id}`).html(stringsub[0]);
                    }
                    else{
                        $(`${id}`).html('');
                    }
                
                    console.log(previuostrigger,triggerid);
                }
        })
    });

    console.log('sayed');

});
})