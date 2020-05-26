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
div {
	background-color:rgba(255, 255, 255, 0.3);
	border:1px solid black;
	padding: 10px 10px 10px 10px;
}
</style>
	<title><?php echo $_GET['name']; ?></title>
	<link rel="stylesheet" href="css/main.css"> 
</head>
<body>
	<center>
		<div>
	<?php 
	$query="SELECT stuNumber,indNumber,firstName,lastName,email,photoName FROM users WHERE stuNumber='{$_GET['stuNumber']}'";
	$usersInfo=mysqli_query($connection,$query);
	if($usersInfo)
	{
		$record=mysqli_fetch_assoc($usersInfo);
		if(!empty($record['photoName']))
		{
			echo '<img src="images/boaders/'.$record['photoName'].'" height="200" title="Logo of a company" alt="photo" style="border:2px solid gray;"/>';
		}
		else
		{
			echo '<img src="images/unknown.png" height="200" title="Logo of a company" alt="photo" style="border:2px solid gray;"/>';
		}
		echo "<br>";
		echo '<article>';
        echo '<h2>'.$_GET['name'].'</h2>';
		echo '<ul>';
		echo "<li><b>Student Number :</b> {$record['stuNumber']}</li><br>";
		echo "<li><b>Index Number :</b> {$record['indNumber']}</li><br>";
		echo "<li><b>E-mail :</b> {$record['email']}</li><br><br>";
		echo '</ul>';
		echo '</div>';
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