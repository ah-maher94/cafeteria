var datefrom=0;
var dateto=0;
$(document).ready(function(){
    $(".logout").click(function () {
        $.post('checkCookies.php',{
            cook: 'delete'
        },function(){
           window.location.replace("login.php");
        });
    })
    
    $('#dateFrom').blur(function(e){
        if(e.target.value)
        {
            // $.post('../php_project/retriveUsers.php',{
            //     dateFrom: e.target.value
            // },function(data,status){
            //     $("#orders").html(data);
            // });
            datefrom=e.target.value;
             
        } 
        else{
            datefrom=0;
        } 
    });
    $('#dateTo').blur(function(e){
        if(e.target.value)
        {
            dateto=e.target.value;
        }
        else
        {
            dateto=0;
        }
        
        // $.post('../php_project/retriveUsers.php',{
        //     dateTo: e.target.value,
        //     dateFrom: datefrom 
        // },function(data,status){
        //     $("#orders").html(data);
        // });
    });
    
    $.post('retriveUsers.php',{
        Name: 'totalAmount'
    },function(data,status){
        $("#users").html(data);
    });
    $.post('retriveUsers.php',{
        Name: 'username'
    },function(data,status){
        var stringsub=data.split('<br>');
        var idString=stringsub[stringsub.length-1];
        var id=idString.split('</t>');
        for(var i=0;i<(stringsub.length-1);i++)
        {
            if(stringsub[i]!='')
            {
                let item=`<span class="dropdown-item links" id=${id[i]}>${stringsub[i]}</span>`;
                $('.dropdown-menu').append(item);
            }
        }
        $('.links').click(function(e){
            $.post('retriveUsers.php',{
                userid: e.target.id,
                dateFrom: datefrom,
                dateTo: dateto
            },function(data,status){
                $("#orders").html(data);
                

                console.log(data);
                // console.log(e.target.id,datefrom,dateto);

                 // Display Order Details
                $(".orderrow").click(function(){
                    $.ajax({
                        type: 'GET',
                        url: 'order-details/display-order-details.php',
                        data: 'id=' + $(this).attr("id"),
                        success: function(order){
                            $("#selectedOrder").html(order);
                            console.log(order);
                        }
                    });
                });
            });
            $("#selectedOrder").html('');
           
        })
    });
});
