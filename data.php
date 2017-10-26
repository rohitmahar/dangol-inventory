<?php
session_start();
if(!isset($_SESSION['sessid'])){
	header('location:design.php');
}
	include 'connect.php';
    $id=$_POST['id'];
		
		$query="Select * from tbl_items where id=".$id;
		$res=mysqli_query($conx, $query);
		$res_row=mysqli_fetch_assoc($res);
		echo json_encode($res_row);
    // var_dump($res_row);die;

		if($res_row['id'] != $id){
			echo 'Data is invalid';
		}

	?>