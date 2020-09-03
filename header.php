<img src = "images\miu.png" align = "left">																			<!--header image and titles-->
<h1 style = "text-align: center">Manipal International University Canteen Service</h1>

<h4 style = "text-align: center">
<?php
	if(!empty($_GET['name']) && empty($name))
		$name = $_GET['name'];
	if(!empty($name) || !empty($_GET['login_sub']) || !empty($_GET['nav_stu']) || !empty($_GET['nav_vendor']))
		{
		 echo "Logged In As: ".$_SESSION['username'];
		 echo "<p align = 'right'><a href = 'main.php' align = 'right'><button>Log Out</button></a></p>";			//logout button
		}
?>
</h4>
