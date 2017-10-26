<?php
  include 'connect.php';
  $sn=$_POST['sn'];
  $discount=$_POST['discount'];
  $total=$_POST['total'];

  if(mysqli_query($conx,"Insert into tbl_discount (sn,discount,grandtotal) values ('$sn','$discount','$total')")){
  	 echo 'success';
  }

  
?>