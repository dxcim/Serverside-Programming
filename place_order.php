<table align = "center" border = "1">								<!--page for students to view menu before placing order-->
	<?php
		include("conn.php");
		$s = "select food_info.food_img, food_info.food_name, food_info.food_cat, food_info.food_price, ven_info.ven_id, food_info.food_id from food_info, ven_info where food_info.ven_id = ven_info.ven_id";
		$d = mysqli_query($conn, $s);
		$i = 1;
		echo "<form action = 'order.php' method = 'post'>";
		while($n = mysqli_fetch_row($d) )
			{
			 if($i % 5 == 0)
				 echo "<tr>";
			 if($n[2]=='V')		
				echo "<td><table border = 1><tr><td align = 'center'><img src ='$n[0]' height = '100px' width = '100px'></td></tr><tr><td><img src = 'images/v.png' height = '10px' width = '10px'>$n[1]</td></tr><tr><td>Price: RM$n[3]</td></tr><tr><td><input type = 'checkbox' name = 'order[]' value = '$n[5]'>Add To Order</td></tr></table></td>";
			 else
				echo "<td><table border = 1><tr><td align = 'center'><img src ='$n[0]' height = '100px' width = '100px'></td></tr><tr><td><img src = 'images/nv.jpg' height = '10px' width = '10px'>$n[1]</td></tr><tr><td>Price: RM$n[3]</td></tr><tr><td><input type = 'checkbox' name = 'order[]' value = '$n[5]'>Add To Order</td></tr></table></td>";
			 if($i % 5 == 0)
				 echo "</tr>";
			 $i++;
			}
	?>
</table>
<p align = "center"><input type = 'submit' name = 'submit' value = 'Place Order'></p>
</form>