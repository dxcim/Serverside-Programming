<?php
	include("conn.php");
	$stat = $_GET['stat'];
	$stu_id = $_GET['id'];
	$time = $_GET['time'];

	if($stat == 'P')
		$sql1 = "update order_info set order_status = 'C' where stu_id = $stu_id and order_time = '$time'"; 				//updates order status
	else
		$sql1 = "update order_info set order_status = 'P' where stu_id = $stu_id and order_time = '$time'";
	
	mysqli_query($conn,$sql1);
	header("location:main.php?nav_vendor=View+Orders");																		//redirects user to previous page
?>