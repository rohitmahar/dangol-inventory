<html>
<?php
require_once('connect.php');
$date=$_GET['date'];
echo $date;
$sql="SELECT * from tbl_temporary WHERE daten='$date'";
	$query=mysqli_query($conx,$sql);
	$numrows=mysqli_num_rows($query);
	if($numrows>0){
		$data=array();
		while($row=mysqli_fetch_assoc($query))
			{array_push($data,$row);
			}
	}
	else{
		$data=array();

	}
	//mysqli_close($conx);
	//echo'<pre>';

	//echo'</pre>';
	$sql2="SELECT SUM(total) as total from tbl_temporary where daten='$date'";
	$query2=mysqli_query($conx,$sql2);
	$res2=mysqli_fetch_assoc($query2);
	$numrows2=mysqli_num_rows($query2);
	if($numrows2>0){
		//echo $res2['total']; 
	}
?>
<head><title>dailysales</title></head>
<body bgcolor="pink"><p align="center">Dangol sales summary</p>
<table width="635" border="1">
<tr>
<td width="41" scope="col">id</td>
<td width="199" scope="col">productname</td>
<td width="120" scope="col">quantity</td>
<td width="120" scope="col">price</td>
<td width="131" scope="col">total</td>
<td width="137" scope="col">date</td>
</tr>


<?php
foreach($data as $value){
?>
<tr>
<td>&nbsp;<?php echo $value['id'];?></td>
<td>&nbsp;<?php echo $value['productname'];?></td>
<td>&nbsp;<?php echo $value['quantity'];?></td>
<td>&nbsp;<?php echo $value['price'];?></td>
<td>&nbsp;<?php echo $value['total'];?></td>
<td>&nbsp;<?php echo $value['daten'];?></td>
</tr>

<?php
}
?>
<tr>
<td colspan="4">Grand total</td>
		
<td><?php echo $res2['total'];  ?></td>
</tr>

</table>
<button onclick="myFunction()">Print this page</button>

<script>
function myFunction() {
   window.print();
}
</script>
<a href="generatebill.php">back</a>
</body>
</html>