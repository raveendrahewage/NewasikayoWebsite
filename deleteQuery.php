<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
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
	<title>Delete</title>
	<link rel="stylesheet" href="css/main.css"> 
</head>
<body>
	<?php 
	unlink("images/boaders/".$_GET['photoName']);
	$query1="DELETE FROM users WHERE stuNumber='{$_GET['stuNumber']}'";
	$query2="DELETE FROM posts WHERE stuNumber='{$_GET['stuNumber']}'";
	$usersInfo1=mysqli_query($connection,$query1);
	$usersInfo2=mysqli_query($connection,$query2);
	if($usersInfo1)
	{
		if($usersInfo2)
		{
			header( "Location:index.php" );die;
		}
	}
	else
	{
	 	echo "Task failed. Please recheck and try.";
	} ?>
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>
