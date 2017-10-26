<?php

	include 'connect.php';
    $id=$_POST['id1'];
    $quan111=$_POST['quan11'];
    $quan222=$_POST['quan22'];
    if ($quan111>$quan222){
    	echo  $quan222. 'quantity is left';
    } else{
    $quan=$quan222-$quan111;
    //echo $quan111;
		
		$query="UPDATE  tbl_items set quantity=" .$quan." where id=".$id;
		//var_dump($query);
		mysqli_query($conx, $query);
		echo "Success";
		// $res_row=mysqli_fetch_assoc($res);
		// echo json_encode($res_row);
    // var_dump($res_row);die;

		// if($res_row['id'] != $id){
		// 	echo 'Data is invalid';
		// }
	}

	?>