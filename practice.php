<?php
session_start();
if(!isset($_SESSION['sessid'])){
  header('location:design.php');
}
  include ('connect.php');
  


  if(isset($_POST['go'])){
    $id=$_POST['id'];
    
    $query="Select * from tbl_items where id=".$id;
    $res=mysqli_query($conx, $query);
    $res_row=mysqli_fetch_assoc($res);


    if($res_row['id'] != $id){
      echo 'Data is invalid';
    }

  }

  if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $productname=$_POST['pname'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $in_quan=$_POST['quantity'];
    $in_quan1=$_POST['quantity1'];
    $res_quan=$in_quan1-$in_quan;
    $total=$price*$quantity;
    $date=date("Y-m-d H:i:s");
    $my_array=array($productname,$quantity,$price,
      $total);
    print_r($my_array);
    echo $date;

    //echo $total;
    //echo $res_quan;
    $sql="UPDATE tbl_items SET quantity=$res_quan where id=".$id;

    //var_dump($sql);exit;

  
    $query=mysqli_query($conx,$sql);
    $sql="INSERT INTO tbl_temporary(productname,quantity,price,total,daten) values('$productname','$quantity','$price','$total','$date')";
    $rohit=mysqli_query($conx,$sql);

  }

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body bgcolor="pink">
<p align="center">Dangol trade home </p>        


<form id="form1" name="form1" method="post" action="">
  <label for="name"></label>
  </form>
<form id="form2" name="form2" method="post" action="">
<input type="hidden" name="quantity1" id="quantity1" value='<?php if(!isset($_POST['go'])){echo '' ;} else{echo $res_row['quantity'];}  ?>' />
  <p>Product id  
    <label for="pname"></label>
    <input type="text" name="id" id="id"  value="<?php if(!isset($_POST['go'])){echo '' ;} else{echo $id;} ?>"/> <input type="submit" name="go" id="go" value="go" />
  </p>
  <p>Product name  
    <label for="pid"></label>
    <input type="text" name="pname" id="pname"  value="<?php if(!isset($_POST['go'])){echo '' ;} else{echo $res_row['productname'];}  ?>"/>
  </p>
  <p>Price
    <label for="price"></label>
    <input type="text" name="price" id="price"  value="<?php if(!isset($_POST['go'])){echo '' ;} else{echo $res_row['price'];}  ?>" />
  </p>
  <p>Quantity
    <label for="quantity"></label>
    <input type="text" name="quantity" id="quantity" />
  </p>
  
    <input type="submit" name="submit" id="submit" value="Submit" />
  </p>
  <p>&nbsp;</p>
</form>
<form id="form1" name="form1" method="post" action="">
  <table width="1003" border="1">
    <tr>
      <th colspan="7" scope="col"><p>Dangol Trade Home </p>
      <p>lagankhel,patan,015538853</p></th>
    </tr>
    <tr>
      <td>Items</td>
      <td colspan="2">Quantity</td>
      <td colspan="3">Price per piece</td>
      <td>Total Price</td>
    </tr>
    
    <tr>
      <td><label for="items"></label>
      <input type="text" name="items" id="items" value="<?php if(!isset($_POST['submit'])){echo '' ;} else{echo $productname;}  ?>">
      <td colspan="2"><label for="quantity"></label>
      <input type="text" name="quantity" id="quantity" value="<?php if(!isset($_POST['submit'])){echo '' ;} else{echo $quantity;}  ?>" /></td>
      <td colspan="3"><label for="priceperpiece"></label>
      <input type="text" name="priceperpiece" id="priceperpiece" value="<?php if(!isset($_POST['submit'])){echo '' ;} else{echo $price;}  ?>"/></td>
      <td><label for="totalprice"></label>
      <input type="text" name="totalprice" id="totalprice" value="<?php if(!isset($_POST['submit'])){echo '' ;} else{echo $total;}  ?>"/></td>
    

    </tr>


    <tr>
      <td colspan="6">Discount</td>
      <td><label for="discount"></label>
      <input type="text" name="discount" id="discount" /></td>
    </tr>
    <tr>
      <td colspan="6">Total</td>
      <td><label for="Total"></label>
      <input type="text" name="Total" id="Total" /></td>
    </tr>
  </table>
  </p>
  <p>&nbsp;</p>
  <a href="salessummary.php">print preview</a><br>
  <a href="home.php">back</a> 
</form>
</body>
</html>

