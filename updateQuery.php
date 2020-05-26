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
	<title>Update</title>
	<link rel="stylesheet" href="css/main.css"> 
</head>
<body>
	<h2><?php echo "{$_POST['firstName']} {$_POST['lastName']}"; ?></h2>
	<?php 
		$stuNumber=$_POST['stuNumber'];
		$indNumber=$_POST['indNumber'];
		$firstName=$_POST['firstName'];
		$lastName=$_POST['lastName'];
		$email=$_POST['email'];
		$phoNumber=$_POST['phoNumber'];
		if(!empty($_FILES['image']['name']))
		{
			$fileName=$_FILES['image']['name'];
			$tmpName=$_FILES['image']['tmp_name'];
			$uploadTo="images/boaders/";
			$query3="UPDATE users SET stuNumber='$stuNumber',indNumber='$indNumber',firstName='$firstName',lastName='$lastName',email='$email',photoName='$fileName',phoNumber='$phoNumber' WHERE stuNumber='$stuNumber' LIMIT 1";
			$usersInfo1=mysqli_query($connection,$query3);
			move_uploaded_file($tmpName, $uploadTo.$fileName);
		}
		else
		{	
			$query1="UPDATE users SET stuNumber='$stuNumber',indNumber='$indNumber',firstName='$firstName',lastName='$lastName',email='$email', phoNumber='$phoNumber' WHERE stuNumber='$stuNumber' LIMIT 1";
			$usersInfo1=mysqli_query($connection,$query1);
		}

		if($usersInfo1)
		{
			header( "Location:profileInfo.php?stuNumber=$stuNumber" );die;
		}
		?>
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>
