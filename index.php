<?php 
$connection = mysqli_connect("localhost", "root", "", "dynamic_textbox");
if(!empty($_POST['save'])){

    $count = count($_POST['item_name']);
        for ($i=0; $i <$count ; $i++) { 
            
            $name = $_POST['item_name'][$i];
            $num = $_POST['item_price'][$i];

            $s = "insert into item (item_name , item_price) values ('$name', $num)";
            print_r($s);
            $r = mysqli_query($connection, $s);
        }
            
    }   



?>

<html>
    <head>
        <link href="php-jquery-dynamic-textbox/css/style.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
        <script>
        
        function addmore(){
            // alert('Please');
            $('<div>').load('i.php',function(){
                $('#product').append($(this).html());
            });

        }
        function remove(){

            $('div.product-item').each(function(index , item){
                jQuery(':checkbox',this).each(function(){
                    if($(this).is(':checked')){
                        // console.log(item);
                        // console.log(index);
                        $(item).remove();
                    }else{
                    }

                });
            });

        }
        </script>
        
        <body>
        <form method="post" action="" name="myform" id="myform">
         <div id="outer" class="outer">
         <div id="header">
                <div class="float-left">&nbsp;</div>
                <div class="float-left col-heading">Item Name</div>
                <div class="float-left col-heading">Item Price</div>
        </div>

            <div id="product">
            <?php require_once("i.php") ?>
            </div>
        <div class="btn-action float-clear">
        <input type="button" name="add_btn" value="add More" onClick="addmore()"/>
        <input type="button" name="del-btn" value="Remove" onClick="remove()"/>
        <span id="delete-btn-required"> </span>
        <span id="error"> </span>
        </div>

        <div class="footer">
            <input type="submit" value="save" name="save" class="savebtn"/>
        </div>
        </div>
        </form>
            
        </body>
    </head>
</html>