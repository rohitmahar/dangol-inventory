<?php
session_start();
if(!isset($_SESSION['sessid'])){
	header('location:design.php');
}
?>
<?php
require_once('connect.php');
/*if(isset($_GET['did'])){
	$p_id=$_GET['did'];
}
$sql="DELETE FROM tbl_items where id='$p_id'";
$query=mysqli_query($conx,$sql);
if($query){
	header('location:editinventory.php');
}
else{
	echo"there is a problem in deleting";

}*/

if(isset($_POST['p_id'])){
	$id=$_POST['p_id'];
}
$sql="DELETE FROM tbl_items where id='$id'";
$query=mysqli_query($conx,$sql);
if($query){
	header('location:editinventory.php');
}
else{
	echo"there is a problem in deleting";

}

?>