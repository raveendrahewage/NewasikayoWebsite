<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
<?php 
	if(isset($_POST['submit']))
	{

		 $stuNumber=$_GET['stuNumber'];
		 $postText=$_POST['postText'];
		 $mediaName=$_FILES['mediaName']['name'];
		 $tmpName=$_FILES['mediaName']['tmp_name'];
		 $uploadTo="images/postMedia/";
		 $query="SELECT firstName,lastName FROM users WHERE stuNumber='{$stuNumber}'";
		 $usersInfo=mysqli_query($connection,$query);
		 $record=mysqli_fetch_assoc($usersInfo);
		 $name=$record['firstName']." ".$record['lastName'];
         $postDate=date("Y-m-d");
         $postTime=date("h:i:s");

		 if(empty($mediaName))
		 {
		 	if(empty($postText))
		 	{
				header( "Location:createPost.php?stuNumber=$stuNumber" );die;
			}
			else
			{
				$query1="INSERT INTO posts (stuNumber,postText,mediaName,name,postDate,postTime)VALUES('{$stuNumber}','{$postText}','{$mediaName}','{$name}','{$postDate}','{$postTime}')";
				$result1=mysqli_query($connection,$query1);
				if($result1)
				{
			 		header( "Location:displayPosts.php?stuNumber=$stuNumber" );die;
				}
			}
		 }
		 else
		 {
		 	$query2="INSERT INTO posts (stuNumber,postText,mediaName,name,postDate,postTime)VALUES('{$stuNumber}','{$postText}','{$mediaName}','{$name}','{$postDate}','{$postTime}')";
			$result2=mysqli_query($connection,$query2);
			if($result2)
			{
				move_uploaded_file($tmpName, $uploadTo.$mediaName);
		 		header( "Location:displayPosts.php?stuNumber=$stuNumber" );die;
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
form.post {
	background-color:rgba(255, 255, 255, 0.3);
	border:2px solid gray;
}
canvas{
	width: 600px;
	height:300px;
    border:2px solid gray;
	cursor: default;
    background-color:rgba(255, 255, 255, 0.2);
}
canvas img {
	max-width: 100%;
}

</style>
	<title>New Post</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
<center>
	<article>
    <h2>New Post</h2>
    <center>
		<form action="createPost.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" method="post" enctype="multipart/form-data" class="post">
		<p><b>Upload a photo</b></p>
        <canvas id="canvas"></canvas><br>
		<input type="file" name="mediaName" id="photoName"><br>
		<textarea rows = "10" cols = "80" name = "postText" autofocus>
         </textarea><br>
		<input type="submit" value=" Post " name="submit">
	 </form>
     </center>
	</article>
    </center>
</body>
</html>
<?php include_once('includes/footer.php'); ?>