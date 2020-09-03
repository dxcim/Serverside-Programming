<?php
	$stu_name = $_SESSION['username'];
	include("conn.php");
	
	$sql1 = "select stu_id from stu_info where stu_name = '$stu_name'";
	$q1 = mysqli_query($conn, $sql1);
	$stu_id = mysqli_fetch_row($q1);
	
	echo "<table border = '1' align = 'center'>";
	echo "<tr><th>Date</th><th>Order</th><th>Total</th><th>Status</th><th></th></tr>";
	
	$sql2 = "select order_info.order_date, group_concat(food_info.food_name), sum(food_info.food_price), order_info.order_status, order_info.order_time from order_info, food_info where food_info.food_id = order_info.food_id and order_info.stu_id = $stu_id[0] group by order_info.order_time";
	$q2 = mysqli_query($conn, $sql2);
	
	while($q = mysqli_fetch_row($q2))
		echo "<tr><td>$q[0]</td><td>$q[1]</td><td>RM$q[2]</td><td>$q[3]</td><td><a href = 'del_order.php?id=$stu_id[0]&time=$q[4]&stat=$q[3]'>Cancel</a></td></tr>";				//displays orders placed by student with the option to cancel an order
	echo "</table>";
?>