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

div {
	background-color:rgba(255, 255, 255, 0.3);
	border:2px solid gray;
}
body {
	background-image: url("images/background.png");
	background-repeat: repeat;
	background-size: contain;
	background-attachment: fixed;
}
</style>
	<title>Display Media</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<article>
		<div>
		<center>
			<?php 
		if(isset($_GET['mediaName']))
		{
			echo '<img src="images/memories/'.$_GET['mediaName'].'" width="auto" height="auto" alt="photo" style="border:2px solid gray;">';
		} ?>
		</center>
		</div>
	</article>
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>