<?php		
	include("conn.php");
	$sql1 = "select * from ven_info";														//sql statment to view vendor table
	$q1 = mysqli_query($conn, $sql1);														//executing the query stored in the variable
	
	$num = mysqli_num_rows($q1);
	if(!empty($_GET['submit'])) 
		{
		 $fb = $_GET['feedback']; 
		 $ven = $_GET['sel_ven']; 
		 if(empty($_SESSION))
			{
			 session_start();
			 if(isset($_GET['submit']))
				{
				 $fb = $_GET['feedback'];		 
				 $name = $_SESSION['username'];
				 $ven = $_GET['sel_ven'];
				 $date = date("Y/m/d");
				 $sql2 = "select stu_id from stu_info where stu_name = '$name'";
				 $q2 = mysqli_query($conn, $sql2);
				 $q3 = mysqli_fetch_row($q2);
				 $sql3 = "insert into feedback(stu_id, ven_id, fb_comment, fb_date) values ($q3[0], $ven, '$fb', '$date')";				//insrts feedback into database
				 mysqli_query($conn, $sql3);
				 echo "<script type='text/javascript'>alert('Your Feedback has been sent!');";
				 echo 'window.location.href="main.php?nav_stu=Send+Feedback?sel_ven=$ven&feedback =$fb";</script>';
				}
			}
		}
?>
<table align = "center">
	<form action = "send_feedback.php" method = "get">											<!--form to submit feedback-->
		<tr><td>Select Vendor: </td><td>
		<select name = "sel_ven">
			<?php
				while($n = mysqli_fetch_row($q1))
					echo "<option value = '$n[0]'>$n[1]</option>";
			?>
		</select></td></tr>
		<tr><td>Enter Feedback</td><td>
		<textarea name = "feedback"></textarea>
		<input type = "submit" name = "submit" value = "Submit">
	</form>
</table>