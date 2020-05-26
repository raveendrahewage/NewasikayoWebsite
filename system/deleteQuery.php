<?php include_once('include/connection.php'); ?>
<?php 
	$query="DELETE FROM users WHERE id = 2 LIMIT 1";
	$usersInfo=mysqli_query($connection,$query);
	if($usersInfo)
	{
		echo mysqli_affected_rows($connection)." rows deleted.<br><br>";
	}
	else
	{
	 	echo "Database query failed.";
	} ?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Query</title>
</head>
<body>

</body>
</html>
<?php mysqli_close($connection); ?>