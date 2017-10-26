<?php
session_start();
if(!isset($_SESSION['sessid'])){
  header('location:design.php');

if(isset($_POST['go'])){
  //var_dump($_POST);exit;
  
  $iid=$_POST['iid'];
  
  $_SESSION['iid']=$iid;
}

}
if(isset($_GET['iid'])){
//echo $_GET['iid'];
$iid=$_GET['iid'];
}
?>
<html>
<head><title>view</title><?php
require_once('connect.php');
$sql="SELECT *FROM tbl_items where id=$iid";
$res=mysqli_query($conx,$sql)or die($mysqli_error($conx));
$numrows=mysqli_num_rows($res);
if($numrows>0){
	$data=array();
	while($row=mysqli_fetch_assoc($res))
	{
		array_push($data,$row);
	}

}else{
	$data=array();
}
mysqli_close($conx);
	echo'<pre>';
		//print_r($data);
			echo'</pre>';
		
//if(isset($_POST['go'])){
  //$iid=$_POST['iid'];
 
//}
  ?>
</head>
<body> 
<body bgcolor="pink"><p align="center" fontsize="10">View/Edit</p><table width="782" border="1">
  <tr>
    <th width="54" scope="col">ID</th>
    <th width="96" scope="col">productname</th>
    <th width="110" scope="col">price</th>
    <th width="121" scope="col">quantity</th>
    <th width="117" scope="col"><pre>manufacturer</pre></th>
    <th width="120" scope="col"><pre>manufactureddate</pre></th>
    <th width="118" scope="col"><pre>expiredate</pre></th>
    <th width="118" scope="col"><pre>option</pre></th>
    

  </tr> <?php
  foreach($data as $key=>$value){
	  ?>
  <tr>
    <td>&nbsp;<?php echo $value['id'];?></td>
    <td>&nbsp;<?php echo $value['productname'];?></td>
    <td>&nbsp;<?php echo $value['price'];?></td>
    <td>&nbsp;<?php echo $value['quantity'];?></td>
    <td>&nbsp;<?php echo $value['manufacturer'];?></td>
    <td>&nbsp;<?php echo $value['manufactureddate'];?></td>
    <td>&nbsp;<?php echo $value['expiredate'];?></td>
    <td><a href="edititem.php?eid=<?php  echo $value['id'];?>">edit</a><a href="delete.php?did=<?php echo $value['id'];?>"></a></td>
    
</tr><?php

  }
  ?>
  <a href="editinventory.php">back</a>
  
</table>
</body>
</html>

