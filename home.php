<?php
session_start();
if(!isset($_SESSION['sessid'])){
	header('location:design.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.rohit {
	font-size: 36px;
	font-family: "Times New Roman", Times, serif;
}
</style>
</head>

<body class="rohit" bgcolor="pink">
<p align="center">Dangol Trade home</p>
<p><a href="additems.php"> 1.Add Items</a></p>
<p><a href="editinventory.php">2.View/Edit Inventory</a></p>
<p><a href="generatebill.php">3.Daily Sales Summary</a></p>
<p><a href="salessummary.php">4.Generate Bill</a></p>
<p><a href="logout.php">logout</a></p>
<p>&nbsp;</p>
</body>
</html>