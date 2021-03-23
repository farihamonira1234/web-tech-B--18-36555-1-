<?php
	require_once('../php/session_header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body style="background-color:powderblue;">
	<h1 style="color:green;">Welcome Qn's World!</h1>
		<?=$_SESSION ['username']?><br>

	<a href="../views/create.php" style="color:green;">Create New User</a> |
	<a href="../views/all_users.php" style="color:green;">User List</a> |
	<a href="../views/createcompanyinfo.php" style="color:green;">Create Company Info</a> |
	<a href="../views/all_company.php" style="color:green;">Company List</a> |
	<a href="../php/logout.php" style="color:green;">Logout</a> 
</body>
</html>