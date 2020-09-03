<?php
	include("conn.php");
	$v_name = $_SESSION['username'];
	$sql1 = "select food_info.food_name, food_info.food_cat, food_info.food_price, food_info.food_id, food_info.food_img from food_info, ven_info where ven_info.ven_name = '$v_name' and ven_info.ven_id = food_info.ven_id";
	$q1 = mysqli_query($conn, $sql1);
	echo "<table border = 1 align = 'center'><tr><th></th><th>Name</th><th>Category</th><th>Price</th><th></th></tr>";
	while($q2 = mysqli_fetch_row($q1))
		{
		 if($q2[1]=='V')	
			echo "<tr><td><img src = '$q2[4]' height = '100px' width = '100px'></td><td>$q2[0]</td><td><img src = 'images/v.png' height = '10px' width = '10px'></td><td>RM$q2[2]</td>";			//displays menu
		 else
			echo "<tr><td><img src = '$q2[4]' height = '100px' width = '100px'></td><td>$q2[0]</td><td><img src = 'images/nv.jpg' height = '10px' width = '10px'></td><td>RM$q2[2]</td>";
		 echo "<td><a href = 'del_menu.php?id=$q2[3]'>Delete</a></td></tr>";
		}
	echo "</table>";
	echo "If you want to add an item to the menu, <a href = 'add_menu.php'>Click Here:</a>";							//redirects to page that add items to menu
?>