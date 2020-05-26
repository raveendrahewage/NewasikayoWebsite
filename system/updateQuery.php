<?php include_once('include/connection.php'); ?>
<?php 
	$query="UPDATE users SET lastName='Udayanga' WHERE id=26 LIMIT 1";
	$usersInfo=mysqli_query($connection,$query);
	if($usersInfo)
	{
		echo mysqli_affected_rows($connection)." rows affected.<br><br>";
	}
	else
	{
	 	echo "Database query failed.";
	} ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Query</title>
</head>
<body>

</body>
</html>
<?php mysqli_close($connection); ?>