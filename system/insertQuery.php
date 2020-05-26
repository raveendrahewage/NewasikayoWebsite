<?php include_once('include/connection.php'); ?>
<?php 
	$firstName1='Rvaindu';
	$lastName='Pramodya';
	$email='ravindu@gmail.com';
	$password='ravindupassword';
	$isDeleted=0;

	$hashedPassword1=sha1($password);

	$query1="INSERT INTO users (firstName,lastName,email,password,isDeleted)VALUES('{$firstName1}','{$lastName}','{$email}','{$hashedPassword1}',{$isDeleted})";

	$result1=mysqli_query($connection,$query1);

	if($result1)
	{
		echo "Record 1 was added";
	}
	else
	{
	 	echo "Database query failed";
	} ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php mysqli_close($connection); ?>