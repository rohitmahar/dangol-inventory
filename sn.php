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
     echo $res;

//}
	 
?>