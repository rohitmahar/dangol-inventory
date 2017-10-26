<?php
session_start();
if(!isset($_SESSION['sessid'])){
  header('location:design.php');
}
?>
<?php



if(isset($_GET['eid'])){
	$id=$_GET['eid'];
//	echo $id;
	}?>

	<?php
	require_once('connect.php');
$sql="SELECT *FROM tbl_items where id=$id";
$res=mysqli_query($conx,$sql)or die($mysqli_error($conx));
	while($row=mysqli_fetch_assoc($res)){
		/*var_dump($row);*/
	



?><html>
<head><title>rohit</title></head>
<body bgcolor="pink"><p align="center">Edit Items</p>

<form name="form1" method="post" action="updateitem.php">
  <p>Product Name
    <label for="productname"></label>
    <span id="sprytextfield1">
    <input type="text" name="productname" id="productname" value="<?php echo $row['productname'];?>">
    </span></p>
  <p>Price
    <label for="price"></label>
    <span id="sprytextfield2">
    <input type="text" name="price" id="price" value="<?php echo $row['price'];?>">
  <span class="textfieldRequiredMsg"></span></span></p>
  <p>Quantity  
    <span id="sprytextfield3">
    <input type="text" name="quantity" id="quantity" value="<?php echo $row['quantity'];?>">
  <span class="textfieldRequiredMsg"></span></span> </p>
  <p>Manufacturer
    <label for="quantity"></label>
    <label for="manufacturer"></label>
    <span id="sprytextfield4">
    <input type="text" name="manufacturer" id="manufacturer" value="<?php echo $row['manufacturer'];?>">
  <span class="textfieldRequiredMsg"></span></span></p>
  <p>Manufactured date  
    <label for="manufactureddate"></label>
    <span id="sprytextfield5">
    <input type="text" name="manufactureddate" id="manufactureddate" value="<?php echo $row['manufactureddate'];?>">
  <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg"></span></span></p>
  <p>Expire date  
    <label for="expiredate"></label>
    <span id="sprytextfield6">
    <input type="text" name="expiredate" id="expiredate" value="<?php echo $row['expiredate'];?>">
  <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg"></span></span></p>
  <p>
    <input type="hidden" name="p_id" value="<?=$_GET['eid']?>">
    <input type="submit" name="update" id="update" value="update">
    <input type="reset" name="cancel" id="cancel" value="cancel">
  </p>
</form>
<form name="delete" method="post" action="delete.php">
<input type="hidden" name="p_id" value="<?=$_GET['eid']?>">

<input type="submit" name="delete" id="delete" value="delete">

</form>
<a href="editinventory.php">back</a></body>
</html>

<?php } ?>