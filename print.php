<?php
require_once('connect.php');
$sql="SELECT * from tbl_sn where id=1";
$query=mysqli_query($conx,$sql);
// $numrows=mysqli_num_rows($query);
// if($numrows>0){
	$row=mysqli_fetch_assoc($query);
	
      $res= $row['SN'];
      $res++;

     $sql1="UPDATE tbl_sn set SN=".$res." where id=1";
     mysqli_query($conx,$sql1);
//}
	 
?>


<html>
<head><title></title></head>
<body>
<p> <table width="1003" border="1">
    <tr>
      <th colspan="7" scope="col"><p>Dangol Trade Home </p><p align="right">s.n: <?php echo $res; ?>
      </p>
      <p>lagankhel,patan,015538853</p></th>
    </tr>
    <tr>
      <td>Items</td>
      <td colspan="2">Quantity</td>
      <td colspan="3">Price per piece</td>
      <td>Total Price</td>
    </tr>
    
    <tr>
      <td><label for="items"></label>
      <input type="text" name="items" id="items" value="<?php if(!isset($_POST['submit'])){echo '' ;} else{echo $productname;}  ?>">
      <td colspan="2"><label for="quantity"></label>
      <input type="text" name="quantity" id="quantity" value="<?php if(!isset($_POST['submit'])){echo '' ;} else{echo $quantity;}  ?>" /></td>
      <td colspan="3"><label for="priceperpiece"></label>
      <input type="text" name="priceperpiece" id="priceperpiece" value="<?php if(!isset($_POST['submit'])){echo '' ;} else{echo $price;}  ?>"/></td>
      <td><label for="totalprice"></label>
      <input type="text" name="totalprice" id="totalprice" value="<?php if(!isset($_POST['submit'])){echo '' ;} else{echo $total;}  ?>"/></td>
    

    </tr>


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
  </table></p>

<button onclick="myFunction()">Print</button>

<script>
function myFunction() {
   window.print();
}
</script>

</body>
</html>