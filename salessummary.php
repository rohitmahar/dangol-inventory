

<?php
session_start();
if(!isset($_SESSION['sessid'])){
  header('location:design.php');
}
  require_once('connect.php');
  


  if(isset($_POST['go'])){
    $id=$_POST['id'];
    
    $query="Select * from tbl_items where id=".$id;
    $res=mysqli_query($conx, $query);
    $res_row=mysqli_fetch_assoc($res);
    var_dump($res_row);die;

    if($res_row['id'] != $id){
      echo 'Data is invalid';
    }

  }

  // if(isset($_POST['submit'])){
  //   $id=$_POST['id'];
  //   $productname=$_POST['pname'];
  //   $quantity=$_POST['quantity'];
  //   $price=$_POST['price'];
  //   $in_quan=$_POST['quantity'];
  //   $in_quan1=$_POST['quantity1'];
  //   $res_quan=$in_quan1-$in_quan;
  //   echo $res_quan;
  //   $total=$price*$quantity;
  //   $date=date("Y-m-d H:i:s");
    // $my_array=array($productname,$quantity,$price,
    //   $total);
    // print_r($my_array);
    //echo $date;

    //echo $total;
    //echo $res_quan;
    //$sql="UPDATE tbl_items SET quantity='".$res_quan."' where id=".$id;

    //var_dump($sql);exit;

  
   // $query=mysqli_query($conx,$sql);
    //$sql="INSERT INTO tbl_temporary(productname,quantity,price,total) values('$productname','$quantity','$price','$total')";
    //$rohit=mysqli_query($conx,$sql);

  //}
   

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script src="js/jquery-1.10.2.min.js"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
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
                $('#quantity1').val(obj.quantity);
                // alert('asdf1'+obj.price);
                
                 
              //   
              });
          
      });


    $('#submit').click(function(){
      var pname=$('#pname').val();
      var price=$('#price').val();
      var quantity=$('#quantity').val();
      var quantity1=$('#quantity1').val();
      if(quantity > quantity1){
          
      }else{
      var total=price*quantity;
      TOTAL=TOTAL+total;
      $('#table1').append('<tr><td>'+pname+'</td><td colspan="2">'+quantity+'</td><td colspan="3">'+price+'</td><td>'+total+'</td></tr>');

       }
    });


    $('#submit').click(function(){
       var id= $('#id').val();
       var quan1 = $("#quantity").val();
      var quan2 = $("#quantity1").val();
      

      // Returns successful data submission message when the entered information is stored in database.
      var dataString = 'id1='+ id +'&quan11='+ quan1 +'&quan22=' + quan2;
      
      // AJAX Code To Submit Form.
      $.ajax({
      type: "POST",
      url: "update.php",
      data: dataString,
      cache: false,
      success: function(result){
      alert(result);
      }
      });
     
      return false;
         
    });


      $('#submit').click(function(){
      
       var quantity = $("#quantity").val();
      var price = $("#price").val();
      var pname=$("#pname").val();
      var sn=$("#sn").val();
      var quan2 = $("#quantity1").val();
      

      // Returns successful data submission message when the entered information is stored in database.
      var dataString = 'quantity='+ quantity +'&price=' + price +'&pname='+ pname +'&sn='+ sn +'&quan2='+ quan2;
      
      // AJAX Code To Submit Form.
      $.ajax({
      type: "POST",
      url: "salesdata.php",
      data: dataString,
      cache: false,
      success: function(result){
      //alert(result);
      }
      });
     
      return false;
         
    });
      
 $('#submit').on('click', function()
    { 
$('#form2').find('input:text, input:password, select, textarea').val('');
    });

    $('#calculate').click(function()
      {
        var discount=$('#discount').val();
        TOTAL=(TOTAL)-(discount/100)*TOTAL;
        $('#Total').val(TOTAL);


        var sn=$('#sn').val();
        // var discount=$('#discount').val();
        var total=$('#Total').val();


        var dataString= 'sn='+sn+ '&discount='+discount+ '&total='+total;

         $.ajax({
          type: "POST",
          url: "discount.php",
          data: dataString,
          cache: false,
          success: function(result){
          //alert(result);
          }
          });
         
          return false;
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
</head>
<body>
<p align="center">Dangol trade home </p>        
<?php
  $date=date("Y-m-d H:i:s");
  echo $date;

  $query_sn=mysqli_query($conx,"Select * from tbl_sn where id=1");
  $res_sn=mysqli_fetch_assoc($query_sn);
  // $sn=$res_sn['SN'];
  // $sn++;

  // mysqli_query($conx,"Update tbl_sn set SN=".$sn. " where id=1");

  // $query_sn1=mysqli_query($conx,"Select * from tbl_sn where id=1");
  // $res_sn1=mysqli_fetch_assoc($query_sn1);
  ?>

<br><br>
<b>Bill No. :</b> <b id="sn1"><?php echo $res_sn['SN'];?></b>
  <input type="hidden" id="sn" name="sn" value="<?php echo $res_sn['SN']; ?>">
<div id="div1">
<form id="form1" name="form1" method="post" action="">
  <label for="name"></label>
  </form>
<form id="form2" name="form2" method="post" action="">

<input type="hidden" name="quantity1" id="quantity1" value='<?php if(!isset($_POST['go'])){echo '' ;} else{echo $res_row['quantity'];}  ?>' />
  <p>Product id  
    <label for="pname"></label>
    <input type="text" name="id" id="id" value="<?php if(!isset($_POST['go'])){echo '' ;} else{echo $id;} ?>"/ > <input type="button" name="go" id="go" value="go" />
  </p>
  <p>Product name  
    <label for="pid"></label>
    <input type="text" name="pname" id="pname"  value="<?php if(!isset($_POST['go'])){echo '' ;} else{echo $res_row['quantity'];}  ?>"/>
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

