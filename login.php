<?php
	session_start();
	if(!isset($_SESSION['sessid'])){
		header('location:design.php');

	}else{
		header('location:home.php');
	}
?>
<?php
	require_once('connect.php');
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	$sql="SELECT*from tbl_inventory where username='$uname' and password='$pass'";
	$query=mysqli_query($conx,$sql) or die("there was some error");
	$numrows=mysqli_num_rows($query);
	var_dump($numrows);

	while($data=mysqli_fetch_array($query)){
		$id=$data['id'];
	}

	if($numrows>0){
		$_SESSION['sessid']=$id;
		echo $_SESSION['sessid'];
		header('location:home.php');

	}
	else{
	echo "sorry wronge credential";

	
	}
?>