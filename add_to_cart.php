<?php
include_once('forms/connection.php');
extract($_GET);  

if(isset($_SESSION['order_id']))
{
	$order_id = $_SESSION['order_id'];
}
else{
	$order_date  = date('Y-m-d');
	$order_no  = date('ymdhis'). rand(1000,9999);
	$order_status ='PENDING';
	
	$order_sql  ="insert into order_details (order_date,order_no ,order_status) values ('$order_date','$order_no', '$order_status')";
	 
	$order_res = mysqli_query($con , $order_sql);
	$_SESSION['order_id'] = $order_id  =mysqli_insert_id($con);
}
	
	$product_id  = $_GET['M_id'];
	$product_rate  =  $_GET['menu_offerprice'];
	if(isset($_GET['product_qty']) and $_GET['product_qty'] =='')
	{
		$product_qty = $_GET['product_qty'];
		$product_amount = $product_rate * $product_qty;
	}
	else{
		$product_qty = 1;
		$product_amount = $product_rate * $product_qty;
	}
	
	$check_sql ="select * from order_items where order_id ='$order_id' and menu_id ='$product_id'"; 
	$check_res = mysqli_query($con , $check_sql);	
	if(mysqli_num_rows($check_res)>0)
	{
		$found_row  = mysqli_fetch_array($check_res);
		$found_row_id =$found_row['id'];
		$old_product_qty =$found_row['product_qty'];
		$product_rate =$found_row['product_rate'];
		$new_product_qty= $old_product_qty+1;
		$product_amount = $product_rate * $new_product_qty;
		$update_qty_sql  = "update order_items set product_qty = '$new_product_qty', product_amount ='$product_amount' where id ='$found_row_id'";
		$item_res = mysqli_query($con , $update_qty_sql);

	}
	else{
	
	$item_sql  ="insert into order_items (order_id,menu_id,product_rate,product_qty,product_amount,status) values ('$order_id','$menu_id', '$product_rate','$product_qty', '$product_amount','PENDING')";
	$item_res = mysqli_query($con , $item_sql);
	}

if($item_res)
{
	echo "<script> alert('Product Added To cart') </script>";
	echo "<script> window.location='index.php'</script>";
}
else{
	echo "Error In data insert ". mysqli_error($con);
}
?>