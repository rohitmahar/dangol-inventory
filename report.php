<?php
session_start();
if(!isset($_SESSION['sessid'])){
	header('location:design.php');
}
	include 'connect.php';
	


	
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" >
$(document).ready(function(){

 var TOTAL=0;


    $('#go').click(function()
        {  
        var id= $('#id').val();
          $.ajax({type:"POST",
          url:'data.php',
          data:"id="+id}).done(function(result)
              {
                var obj=$.parseJSON(result);
                $('#pname').val(obj.productname);
                $('#price').val(obj.price);
                // alert('asdf1'+obj.price);
                
                 
              //   
              });
          
      });
    $('#submit').click(function(){
      var pname=$('#pname').val();
      var price=$('#price').val();
      var quantity=$('#quantity').val();
      var total=price*quantity;
      TOTAL=TOTAL+total;
      $('#table1').append('<tr><td>'+pname+'</td><td colspan="2">'+quantity+'</td><td colspan="3">'+price+'</td><td>'+total+'</td></tr>');
    });
;
    $('#calculate').click(function()
      {
        var discount=$('#discount').val();
        TOTAL=(TOTAL)-(discount/100)*TOTAL;
        $('#Total').val(TOTAL);
      });
    $('#print').click(function()
      {
        
       
         $.ajax({type:"POST",
          url:'sn.php'
          }).done(function(result)
              {
                var obj=$.parseJSON(result);
                $('#sn').html("S NO: "+result);
                
                   $('#div1').css("visibility","hidden");
                  $('#div2').css("visibility","hidden");
                   window.print();

                 $('#div1').css("visibility","visible");
                 $('#div2').css("visibility","visible");
                  $('#sn').html("");
              //   
              });
         
       
      });
   
});
  
</script>

<body>
<p align="center">Dangol trade home </p>        
  <!-- #BeginDate format:Am1 -->
September 8, 2016
<!-- #EndDate -->

<p id="sn"></p>
<div id="div1">
<form id="form1" name="form1" method="post" action="">
  <label for="name"></label>
  </form>
<form id="form2" name="form2" method="post" action="">
<input type="hidden" name="quantity1" id="quantity1" value='<?php if(!isset($_POST['go'])){echo '' ;} else{echo $res_row['quantity'];}  ?>' />
  <p>Product id  
    <label for="pname"></label>
    <input type="text" name="id" id="id"  value="<?php if(!isset($_POST['go'])){echo '' ;} else{echo $id;} ?>"/> <input type="button" name="go" id="go" value="go" />
  </p>
  <p>Product name  
    <label for="pid"></label>
    <input type="text" name="pname" id="pname"  value="<?php if(!isset($_POST['go'])){echo '' ;} else{echo $res_row['productname'];}  ?>"/>
  </p>
  <p>Price
    <label for="price"></label>
    <input type="text" name="price" id="price"  value="<?php if(!isset($_POST['go'])){echo '' ;} else{echo $res_row['price'];}  ?>" />
  </p>
  <p>Quantity
    <label for="quantity"></label>
    <input type="text" name="quantity" id="quantity" />
  </p>
  
    <input type="button" name="submit" id="submit" value="Submit" />
  </p>
  <p>&nbsp;</p>
</form>
</div>
<form id="form" name="form1" method="post" action="">
  <table width="1003" border="1">
  <tbody id="table1">
    <tr>
      <th colspan="7" scope="col"><p>Dangol Trade Home </p>
      <p>lagankhel,patan,015538853</p></th>
    </tr>
    <tr>
      <td>Items</td>
      <td colspan="2">Quantity</td>
      <td colspan="3">Price per piece</td>
      <td>Total Price</td>
    </tr>
     </tbody>
  </table> 
     <table width="1003" border="1">
  <tbody id="table1">
    <tr>
      <td colspan="6">Discount</td>
      <td><label for="discount"></label>
      <input type="text" name="discount" id="discount" /></td>
    </tr>
    <tr>
      <td colspan="6">Total</td>
      <td><label for="Total"></label>
      <input type="text" name="Total" id="Total" /></td>
    </tr>
    </tbody>
  </table> 
  <div id="div2">
    <input type="button" name="calculate" id="calculate" value="Calculate" />
   <input type="button" name="print" id="print" value="Print" />

  <a href="home.php">back</a> 
  
  </div>
   
</form>
</body>
</html>

