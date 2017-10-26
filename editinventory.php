<?php
session_start();
if(!isset($_SESSION['sessid'])){
  header('location:design.php');
}

?>
<html>			
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head><?php
require_once('connect.php');
$sql="SELECT *FROM tbl_items";
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
  <a href="home.php">back</a>
  <form name="form1" method="get" action="searchview.php">
  <p>Search
    <label for="iid"></label>
    <span id="sprytextfield1">
    <input  name="iid" id="iid" placeholder="enter id" required value="">
    </span>
    <input type="submit" name="go" id="go" value="go">
    </p>

  
</table>
</body>
</html>
