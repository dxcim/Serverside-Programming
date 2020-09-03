<table border = "1" align = "center">
<tr><th>Student Name</th><th>Order</th><th>Total</th><th>Status</th><th></th></tr>
<form method = "post" action = "upd_order">
<?php
	include("conn.php");
	$v_name = $_SESSION['username'];	
	$sql1 = "select ven_id from ven_info where  ven_name = '$v_name'";
	$q1 = mysqli_query($conn, $sql1);
	$ven_id = mysqli_fetch_row($q1);
	
	$sql2 = "select stu_info.stu_name, group_concat(food_info.food_name), sum(food_info.food_price), order_info.order_status, stu_info.stu_id, order_info.order_time from stu_info, order_info, food_info where order_info.stu_id = stu_info.stu_id and food_info.food_id = order_info.food_id and order_info.ven_id = $ven_id[0] group by order_info.order_time";
	$q2 = mysqli_query($conn, $sql2);
	while($q = mysqli_fetch_row($q2))
		{
		 if($q[3] == "P")
			echo "<tr><td>$q[0]</td><td>$q[1]</td><td>$q[2]</td><td>$q[3]</td><td><a href = 'upd_order.php?stat=$q[3]&id=$q[4]&time=$q[5]'>Completed</a></td></tr>";			//displays orders to vendor with the option to update status
		 else
			echo "<tr><td>$q[0]</td><td>$q[1]</td><td>$q[2]</td><td>$q[3]</td><td><a href = 'upd_order.php?stat=$q[3]&id=$q[4]&time=$q[5]'>Pending</a></td></tr>";
		}
?>
</form>
</table>