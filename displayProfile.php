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
	<title><?php echo $_GET['name']; ?></title>
	<link rel="stylesheet" href="css/main.css"> 
</head>
<body>
<center>
	<?php 
	$query="SELECT stuNumber,indNumber,firstName,lastName,email,photoName FROM users WHERE stuNumber='{$_GET['stuNumber']}'";
	$usersInfo=mysqli_query($connection,$query);
	if($usersInfo)
	{
		$record=mysqli_fetch_assoc($usersInfo);
		echo '<img src="images/boaders/'.$record['photoName'].'" height="200" title="Logo of a company" alt="photo" style="border:2px solid gray;"/>';
		echo "<br>";
		echo '<article>';
        echo '<h2>Profile</h2>';
		echo "<ul><b>Student Number :</b> {$record['stuNumber']}</ul><br>";
		echo "<ul><b>Index Number :</b> {$record['indNumber']}</ul><br>";
		echo "<ul><b>E-mail :</b> {$record['email']}</ul><br><br>";
		echo '</article>';
	}
	else
	{
	 	echo "Query failed.";
	} ?>
    </center>
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>