<?php
	session_start();
	$ven = $_SESSION['username'];
	include("conn.php");
	include("header.php");
	
	if(isset($_POST['add']))
		{
		 $name = $_POST['name'];
		 $cat = $_POST['cat'];
		 $price = $_POST['price'];
		 $sql1 = "select ven_id from ven_info where ven_name = '$ven'";
		 $q1 = mysqli_query($conn, $sql1);
		 $q2 = mysqli_fetch_row($q1);
		 
		 $file_name=$_FILES['pic']['name'];
		 $file_size=$_FILES['pic']['size'];
		 $file_type=$_FILES['pic']['type'];
		 $file_tmp=$_FILES['pic']['tmp_name'];
	
		 $str=explode("/", $file_type);
	
		 if($str[1]=="png" || $str[1] == "jpeg" || $str[1]=="jpg" || $str[1]=="bmp")
			{
			 $filename1 = $ven."_".$name;
			 move_uploaded_file($file_tmp, "images/".$filename1);							//moves uploaded image to local directory 'images/'
			}
		 $img = "images/".$filename1;
		
		 $sql2 = "insert into food_info(food_name, food_cat, food_price, food_img, ven_id) values ('$name', '$cat', $price, '$img', $q2[0])";
		 mysqli_query($conn, $sql2);
		 echo "<script type='text/javascript'>alert('Your Menu has been Updated!');</script>";
		}
?>
<table height = 50% width = 100% bgcolor = 'orange'>
<tr><td style="vertical-align: top">
<form action = "add_menu.php" method = "post" enctype="multipart/form-data">				<!--form to add items to menu-->
	<table align = "center">
		<tr><td>Name of Dish:</td><td><input type ="text" name = "name"></td></tr>
		<tr><td>Category:</td><td>
			<select name = "cat">
				<option value = "V">Vegetarian</option>
				<option value = "N">Non-Vegetarian</option>
			</select>
		</td></tr>
		<tr><td>Price of Dish:</td><td><input type ="text" name = "price"></td></tr>
		<tr><td>Insert Image:</td><td><input type="file" name="pic"></td></tr>
		<tr><td><input type = "submit" name = "add" value = "ADD"></td></tr>
	</table>
</form>
<a href = "main.php?nav_vendor=Update+Menu">Click Here</a> to go back to Menu
</td></tr>
</table>
<?php 
	include("footer.php");
?>