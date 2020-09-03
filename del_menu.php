<?php
	include("conn.php");
	$id = $_GET['id'];
	$sql1 = "delete from food_info where food_id = '$id'";				//sql command to delete menu item
	mysqli_query($conn, $sql1);
?>
<script type = "text/javascript">
	alert("Entry deleted!");
	window.location.href="main.php?nav_vendor=Update+Menu";
</script>