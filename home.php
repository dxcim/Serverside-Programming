<h3 align = center>Home</h3>
<?php
	include("conn.php");
	$type = $_SESSION['usertype'];
	$name = $_SESSION['username'];
	
	if($type == "Vendor")									//displays a different home page depending on the user type
		{
		 $name = $_SESSION['username'];
		 $sql1 = "select order_info.order_id, sum(food_info.food_price) from order_info, ven_info, food_info where food_info.ven_id = order_info.ven_id and ven_info.ven_name = '$name' and ven_info.ven_id = order_info.ven_id and order_info.order_status = 'P'";
		 $sql2 =mysqli_query($conn, $sql1);
		 $n = mysqli_num_rows($sql2);
		 $sum = mysqli_fetch_row($sql2);
		 
		 echo "<h4>Welcome $name! You have $n new orders!</h3>";
		 echo "<h4>Total Earnings: RM$sum[1]</h3>";
		}
	else
		{
		 $name = $_SESSION['username'];
		 $sql1 = "select ven_name from ven_info";
		 $q1 = mysqli_query($conn,$sql1);
		 
		 echo "<h4>Welcome $name! The following vendors are available: </h3><ul>";
		 while($q = mysqli_fetch_row($q1))
			 echo "<li>$q[0]</li>";
		 echo "</ul>";
		}
?>