<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
<?php 
	$stuNumber=$_POST['stuNumber'];
	$indNumber=$_POST['indNumber'];
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$email=$_POST['email'];
	$password=$_POST['password1'];
	$password1=$_POST['password2'];
	
	$fileName=$_FILES['image']['name'];
	$fileType=$_FILES['image']['type'];
	$fileSize=$_FILES['image']['size'];
	$tmpName=$_FILES['image']['tmp_name'];
	$uploadTo='images/boaders/';

	 ?>
<!DOCTYPE html>
<html>
<head>
	<style>
h1 {
  text-align: center;
}

p.date {
  text-align: right;
}

p.main {
  text-align: justify;
}
body {
	background-image: url("images/background.png");
	background-repeat: repeat;
	background-size: contain;
	background-attachment: fixed;
}
</style>
	<title>Adding</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<h2><?php echo "{$firstName} {$lastName}"; ?></h2>
	<?php
	$query1="INSERT INTO users (stuNumber,indNumber,firstName,lastName,email,photoName,password)VALUES('{$stuNumber}','{$indNumber}','{$firstName}','{$lastName}','{$email}','{$fileName}','{$password}')";
	$result1=mysqli_query($connection,$query1);

	if($result1)
	{
		move_uploaded_file($tmpName, $uploadTo.$fileName);
		$query2="SELECT stuNumber,indNumber,firstName,lastName,email,photoName FROM users WHERE stuNumber='{$stuNumber}'";
		$usersInfo2=mysqli_query($connection,$query2);
		if($usersInfo2)
		{
			header( "Location:home.php?stuNumber=$stuNumber" );die;
		}
	}
	else
	{
	 	echo "Task failed";
	} ?>

</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>