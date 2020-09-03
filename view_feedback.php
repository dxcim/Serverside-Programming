<?php
	include("conn.php");
	
	$v_name = $_SESSION['username'];
	$sql1 = "select feedback.fb_date, feedback.fb_comment from feedback, ven_info where ven_info.ven_name = '$v_name' and ven_info.ven_id = feedback.ven_id";
	$q1 = mysqli_query($conn, $sql1);
	
	echo "<table border = 1 align = 'center'><tr><th>Date</th><th>Comments</th></tr>";
	while($i = mysqli_fetch_row($q1))
		echo "<tr><td>$i[0]</td><td>$i[1]</td></tr>";										//displays feedback to vendor
	echo "</table>";
?>