<?php
session_start();
if(isset($_SESSION['sessid'])){
  header('location:login.php');

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.rohit {
  color: #990;
}
.rohit {
  color: #939;
  font-family: "Arial Black", Gadget, sans-serif;
}
#form1 {
  font-size: 24px;
  color: #90F;
}
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>

<body bgcolor="pink">
<h1 class="rohit" align="center">Welcome Dangol trade home</h1>
<form id="form1" name="form1" method="post" action="login.php">
  Username
  <label for="uname"></label>
  <span id="sprytextfield2"><span class="textfieldRequiredMsg">
  <input type="text" name="uname" id="uname2" />
  </span></span>
  <p>Password    
    <label for="pass"></label>
    <label for="pass"></label>
    <span id="sprytextfield3"><span class="textfieldRequiredMsg"></span></span>
    <label for="uname4"></label>
    <label for="pass"></label>
    <span id="sprytextfield4">
    <input type="password" name="pass" id="pass" /> 
    </span></p>
  <p>
    <input type="submit" name="login" id="login" value="Submit" />
  </p>
</form>
<p>&nbsp;</p>
<form id="form2" name="form2" method="post" action="">
  <label for="uname2"></label>
</form>
<form id="form3" name="form3" method="post" action="">
  <span id="sprytextfield1">
    <label for="uname3"></label>
    <span class="textfieldRequiredMsg"></span></span>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur"]});
</script>
</body>
</html>