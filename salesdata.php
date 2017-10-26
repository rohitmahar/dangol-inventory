<?php
include 'connect.php';

     $pname=$_POST['pname'];
     $sn=$_POST['sn'];
     $price=$_POST['price'];
     $quantity=$_POST['quantity'];
     $total=$price*$quantity;
     $date=date("Y-m-d H:i:s");
     $quan2=$_POST['quan2'];

     if($quantity>$quan2){

     }else{
       mysqli_query($conx,"Insert into tbl_temporary (sn,productname,quantity,price,total,daten) values('$sn','$pname','$quantity','$price','$total','$date')");
   }
?>