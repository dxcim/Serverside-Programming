<?php
	include("conn.php");									//includes the connection file to connect to database
	if(isset($_GET['login_sub']) || !empty($_GET['nav_stu']) || !empty($_GET['nav_vendor']))
		{
		 session_start();									//starts session
		 if(!empty($_GET['name']))
			$_SESSION['username'] = $_GET['name'];			//saves username as session variable
		 if(!empty($_GET['type']))
			$_SESSION['usertype'] = $_GET['type'];			//saves user type as session variable
		 if(!empty($_SESSION['usertype']) && !empty($_SESSION['username']) && empty($_GET['nav_stu']) && empty($_GET['nav_vendor']))
			{
			 if($_SESSION['usertype'] == "Student")			//checks for existing student user
				{
				 $user=$_SESSION['username'];
				 $pass = $_GET['pass'];
				 $sql1 = "select stu_name, stu_pass from stu_info where stu_name = '$user' and stu_pass = '$pass'";
				 $q1 = mysqli_query($conn, $sql1);
				 $q2 = mysqli_num_rows($q1);
				 
				 if($q2==0)
					{
					 echo '<script type="text/javascript">';
					 echo 'alert("User does not exist!");'; 
					 echo 'window.location.href="main.php";';
					 echo '</script>';
					}
				}
			 else if($_SESSION['usertype'] == "Vendor")		//checks for existing vendor user
				{
				 $user=$_SESSION['username'];
				 $pass = $_GET['pass'];
				 $sql1 = "select ven_name, ven_pass from ven_info where ven_name = '$user' and ven_pass = '$pass'";
				 $q1 = mysqli_query($conn, $sql1);
				 $q2=mysqli_num_rows($q1);
				 if($q2==0)
					{
					 echo '<script type="text/javascript">';
					 echo 'alert("User does not exist!");'; 
					 echo 'window.location.href="main.php";';
					 echo '</script>';
					}
				}
			}
		}
?>
<html>
<head>
	<title>Canteen Service</title>
</head>
<body>
	<table height = 30% width = 100%>
	<tr><td><?php include("header.php");?></td></tr>
	</table>
	
	<table height = 50% width = 100% bgcolor = 'orange'>
	<?php
		if(isset($_GET['login_sub']) || !empty($_GET['nav_stu']) || !empty($_GET['nav_vendor']))			//displays relevant nav bar for the user type
			{
			 if($_SESSION['usertype'] == "Student" || !empty($_GET['nav_stu']))
				 include("nav_student.php");
			 else if($_SESSION['usertype'] == "Vendor" || !empty($_GET['nav_vendor']))
				 include("nav_vendor.php");
			}
	?>
	<tr><td style="vertical-align: top">																	
		<?php 
			if(isset($_GET['login_sub']) || !empty($_GET['nav_stu']) || !empty($_GET['nav_vendor']))		//displays content according to nav bar
				{
				 if(isset($_GET['nav_stu']))
					{
					 switch($_GET['nav_stu'])
						{
						 case 'Place Order': include("place_order.php");
										     break;
						 case 'View Orders': include("view_order_stu.php");
											 break;
						 case 'Send Feedback': include("send_feedback.php");		
											   break;
						 default : include("home.php");
								   break;
						}
					}
				 else if(isset($_GET['nav_vendor']))
					{
					 switch($_GET['nav_vendor'])
						{
						 case 'Update Menu': include("update_menu.php");
										  break;
						 case 'View Orders': include("view_order_ven.php");
											break;
						 case 'View Feedback': include("view_feedback.php");
									  break;
						 default : include("home.php");
								   break;
						}
					}
				 else
					 include("home.php");
				}
			 else
				 include("login.php");
		?>
	</td>
	</table>
	
	<table height = 20% width = 100%>
	<tr><td><?php include("footer.php");?></td></tr>		<!--includes footer at end of the page-->					
	</table>	
</body>
</html>