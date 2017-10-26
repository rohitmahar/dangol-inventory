<?php
session_start();
if(!isset($_SESSION['sessid'])){
  header('location:design.php');
}
?>
<style type="text/css">
.rohit {
  font-family: "Arial Black", Gadget, sans-serif;
}
.rohit {
  font-size: 24px;
}
.rohit .rohit {
  font-family: "Times New Roman", Times, serif;
}
.rohit .rohit {
  font-family: "Times New Roman", Times, serif;
  font-size: 36px;
  font-weight: bold;
}
.rohit {
  font-family: "Times New Roman", Times, serif;
}
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap/jquery.js"></script>
<script type="text/javascript" src="jquery-ui/jqueryui/jquery-ui.min.js"></script>
<body class="rohit" bgcolor="pink"><p align="center" ><span class="rohit"></span>Add Items</p>
<form name="form1" method="post" action="additems_code.php">
  <p>Product Name
    <label for="productname"></label>
    <span id="sprytextfield1">
    <input type="text" name="productname" id="productname" required>
    </span></p>
  <p>Price
    <label for="price"></label>
    <span id="sprytextfield2">
    <input type="text" name="price" id="price" required>
  <span class="textfieldRequiredMsg"></span></span></p>
  <p>Quantity  
    <span id="sprytextfield3">
    <input type="text" name="quantity" id="quantity" required>
  <span class="textfieldRequiredMsg"></span></span> </p>
  <p>Manufacturer
    <label for="quantity"></label>
    <label for="manufacturer"></label>
    <span id="sprytextfield4">
    <input type="text" name="manufacturer" id="date">
  <span class="textfieldRequiredMsg"></span></span></p>
  <p>Manufactured date  
    <label for="manufactureddate"></label>
    <span id="sprytextfield5">
    <input type="date" name="manufactureddate" id="manufactureddate">
    
</div>
    <script type="text/javascript" scr="js/jquery.js"></script>
    <script type="text/javascript" scr="js/query-ui.js"></script>
    <script type="text/javascript" scr="js/ui.js"></script>
  <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg"></span></span></p>
  <p>Expire date  
    <label for="expiredate"></label>
    <span id="sprytextfield6">
    <input type="date" name="expiredate" id="expiredate">
  <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg"></span></span></p>
  <p>
  <!-- try -->


  <!-- try -->
    <input type="submit" name="add" id="add" value="add">
    <input type="reset" name="cancel" id="cancel" value="cancel">
  </p>
  <a href="home.php">back</a>

</form>
<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "date", {validateOn:["blur"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "date", {validateOn:["blur"]});
</script>

