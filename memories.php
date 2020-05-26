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
    width:97%;
    height:auto;
	font-family: Comic Sans MS;
}
form.memory {
	background-color:rgba(255, 255, 255, 0.3);
	border:2px solid gray;
	padding: 10px 10px 10px 10px;
}
canvas{
	width: 200px;
	height:200px;
    border:2px solid gray;
	cursor: default;
    background-color:rgba(255, 255, 255, 0.2);
}
canvas img {
	max-width: 100%;
}

</style>

	<title>Memories</title>
	<link rel="stylesheet" href="css/main.css"> 
</head>
<body>
<center>
	<article>
    <h2>Memories</h2>
		<form action="memories.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" method="post" enctype="multipart/form-data" class="memory">
			<center>
            <canvas id="canvas"></canvas><br>
			<input type="file" name="image" id="photoName"><br>
			<input type="submit" value=" Add " name="submit">
			</center>
		</form>
		<br>
	<?php 
	$query="SELECT mediaName FROM memories";
	$usersInfo=mysqli_query($connection,$query);
	if($usersInfo)
	{
		$i=0;
		$records=mysqli_num_rows($usersInfo);
		while($i< $records)
		{	
			$record=mysqli_fetch_assoc($usersInfo);
			echo '<div class="photo">';
			echo '<center>';
			echo '<a href="displayMedia.php?mediaName='.$record['mediaName'].'&stuNumber='.$_GET['stuNumber'].'"><img data-original="images/memories/'.$record['mediaName'].'" width="200" height="200" alt="photo"style="border:2px solid gray;" class="memo"></a>';
			echo '<br><hr>';
			echo '<a href="memories.php?mediaName='.$record['mediaName'].'&stuNumber='.$_GET['stuNumber'].'"><input type="submit" value=" Delete " name="delete"></a>';
			echo '</center>';
			echo '</div>';
			$i++;
			if($i<$records)
			{
				echo '<hr>';
			}
		}
	}
	 ?>
	</article>
    </center>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha256-rXnOfjTRp4iAm7hTAxEz3irkXzwZrElV2uRsdJAYjC4=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $('img.memo').lazyload();
        });
    </script>-->

</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>