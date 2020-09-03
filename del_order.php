<?php
	include("conn.php");
	$s_id = $_GET['id'];
	$time = $_GET['time'];
	$stat = $_GET['stat'];
	if($stat == 'P')
		{
		 $sql1 = "delete from order_info where stu_id = '$s_id' and order_time = '$time'";			//deletes order placed by student
		 mysqli_query($conn, $sql1);
?>
<script type = "text/javascript">
	alert("Order Cancelled!");
	window.location.href="main.php?nav_stu=View+Orders";
</script>
<?php
		}
	else
		{
?>
<script type = "text/javascript">
	alert("Completed Orders cannot be cancelled!");													//prevents student from cancelling completed orders
	window.location.href="main.php?nav_stu=View+Orders";
</script>
<?php 
		}
?>