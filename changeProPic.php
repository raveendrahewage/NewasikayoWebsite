<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
<?php
	if(isset($_POST['submit']))
	{
		$fileName=$_FILES['image']['name'];
		$fileType=$_FILES['image']['type'];
		$fileSize=$_FILES['image']['size'];
		$tmpName=$_FILES['image']['tmp_name'];
		$uploadTo='images/memories/';

		if(!empty($fileName))
		{
			$query1="INSERT INTO memories (mediaName)VALUES('{$fileName}')";
			$result1=mysqli_query($connection,$query1);
			if($result1)
			{
				move_uploaded_file($tmpName, $uploadTo.$fileName);
			}
		}
	}
	if(isset($_GET['mediaName']))
	{
		$uploadTo='images/memories/';
		if(!empty($_GET['mediaName']))
		{
			$query2="DELETE FROM memories WHERE mediaName='{$_GET['mediaName']}'";
			$result2=mysqli_query($connection,$query2);
			if($result2)
			{
				unlink($uploadTo.$_GET['mediaName']);
			}
		}
	}
	 ?>
<!DOCTYPE html>
<html>
<head>
	<style>
h1 {
  text-align: center;
}
body {
	background-image: url("images/background.png");
	background-repeat: repeat;
	background-size: contain;
	background-attachment: fixed;
}
div.photo {
	background-color:rgba(255, 255, 255, 0.3);
	border:2px solid gray;
	padding: 10px 10px 10px 10px;
	font-size: 20px;
	font-family: Comic Sans MS;
}
form.memory {
	background-color:rgba(255, 255, 255, 0.3);
	border:2px solid gray;
	padding: 10px 10px 10px 10px;
}

</style>

	<title>Change Profile Picture</title>
	<link rel="stylesheet" href="css/main.css"> 
</head>
<body>
<center>
	<article>
		<h2>Change Profile Picture</h2>
		<form action="changeProPic.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" method="post" enctype="multipart/form-data" class="memory">
			<center>
			<input type="file" name="image" id=""><br>
			<input type="submit" value=" Set As Profie Picture " name="submit">
			</center>
		</form>
	</article>
    </center>
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>