<?php
	session_start();
?>
<html>
<body>
	<h3 align = "center">Login Here</h3>									<!--login form-->
	<table align = "center">
		<form action = "main.php" method = "get">
		<tr><td><input type = "text" name = "name" placeholder = "Name" value = "<?php if(!empty($name)) echo $name;?>"></td></tr>
		<tr><td><input type = "password" name = "pass" placeholder = "Password"></td></tr>
		<tr><td><input type = "radio" name = "type" value = "Student">Student</td></tr>
		<tr><td><input type = "radio" name = "type" value = "Vendor">Vendor</td></tr>
		<tr><td><input type = "submit" name = "login_sub" value = "Submit"></td></tr>
	</table>
</body>
</html>