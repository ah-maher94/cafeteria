<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
    .b input[type="text"],select,option{
	border: 0;
	background: none;
	display: block;
	margin: 20px auto;
	text-align: center;
	border: 2px solid #cc0066;
	padding: 14px 10px;
    width: 180px;
    max-height:20px;
	outline: none;
	color: black;
	border-radius: 24px;
	transition: 0.5s;
    }
    .b input[type="text"]:focus{
    width: 200px;
    border-color: #3333FF;
    }
    .b input[type="submit"]{
	border: 0;
	background: none;
	display: block;
	margin: 20px auto;
	text-align: center;
	border: 2px solid #3333FF;
	padding: 14px 40px;
    width: 80px;
    height: 30px;
	outline: none;
    color: gray;
    text-align: center;
	border-radius: 24px;
	transition: 0.5s;
	cursor: pointer;
	font-weight: 300;
}
.b input[type="submit"]:hover{
	background: #994C00;
}
.list-group{
    width: 200px;
}
.result-align{
    position: flex;
    top: 10%;
    left: 50%;
    max-width:12vw;
    border-top: none;
}
    </style>
</head>
<body>
    <div class="b">
        <input  type="text" name="fullname" id='fname' placeholder="" required>
        <input type="submit" class="search"></input>
    </div>

    <div> -->
        <!-- <div class="list-group">
            <div name="select" id="select">
                <a href="#" class="list-group-item list-group-item-action">First item</a>
                <a href="#" class="list-group-item list-group-item-action">Second item</a>
                <a href="#" class="list-group-item list-group-item-action">Third item</a>
            </div>
        </div> -->
            <!-- <option value="sa" id='1'>sayed</option>
            <option value="se" id='2'>maima</option>
            <option value="sq" id='3'>memo</option>
            <div name="select" id="select" class="result-align">
        <!-- <div name="select" id="select"> -->
                <a href="#" class="list-group-item list-group-item-action">First item</a>
                <a href="#" class="list-group-item list-group-item-action">Second item</a>
                <a href="#" class="list-group-item list-group-item-action">Third item</a>
            </div>   
    </div>
</body>
<script>
    var sa=document.getElementsByClassName('search')[0];
    sa.addEventListener('click',search);
    function search(){
        var sa=document.getElementById('select');
        console.log(sa.value);
        // $.post('checks.php',{
        // ID: sa.value
        // },function(data){
        //     console.log('received');
        // });
    }

    
</script>
</html>