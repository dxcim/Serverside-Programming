<?php																	//form handler to process the order form
	session_start();
	include("conn.php");
	if(isset($_POST['submit']))
		{
		 $name = $_SESSION['username'];
		 $items = $_POST['order'];
		 $stat = "P";
		 $date = date("Y/m/d");
		 $time = date("h:i:sa");
		 $sql1 = "select stu_id from stu_info where stu_name = '$name'";
		 $q1 = mysqli_query($conn, $sql1);
		 $stu_id = mysqli_fetch_row($q1);
		 
		 if(!empty($items))
			{
			 for($i = 0; $i < count($items); $i++)
				{
				 $sql2 = "select ven_id from food_info where food_id = $items[$i]";
				 $q2 = mysqli_query($conn, $sql2);
				 $ven_id = mysqli_fetch_row($q2);
				 
				 $sql3 = "insert into order_info(food_id, order_status, stu_id, ven_id, order_date, order_time) values ($items[$i], '$stat', $stu_id[0], $ven_id[0],'$date', '$time')";
				 mysqli_query($conn, $sql3);
				 
				 echo "<script type='text/javascript'>alert('Your order has been placed!');";
				 echo 'window.location.href="main.php?nav_stu=Place+Order";</script>';
				}
			}
		 else
			{
			 echo "<script type='text/javascript'>alert('You haven't selected an item!');";
			 echo 'window.location.href="main.php?nav_stu=Place+Order";</script>';
			}
		}
?>