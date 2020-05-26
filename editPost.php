<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
<?php 
	if(isset($_POST['submit']))
	{

		 $stuNumber=$_GET['stuNumber'];
		 $postId=$_GET['postId'];
		 $id=$_GET['id'];
		 $postText=$_POST['postText'];
		 $mediaName=$_FILES['mediaName']['name'];
		 $tmpName=$_FILES['mediaName']['tmp_name'];
		 $uploadTo="images/postMedia/";
		 $query="SELECT firstName,lastName FROM users WHERE stuNumber='{$stuNumber}'";
		 $usersInfo=mysqli_query($connection,$query);
		 $record=mysqli_fetch_assoc($usersInfo);
		 $name=$record['firstName']." ".$record['lastName'];

		 if(empty($mediaName))
		 {
		 		$query1="UPDATE posts SET postText='$postText' WHERE stuNumber='$stuNumber' AND postId='$postId' LIMIT 1";
				$result1=mysqli_query($connection,$query1);
				if($result1)
				{
					if($id==1)
					{
			 			header( "Location:profileInfo.php?stuNumber=$stuNumber" );die;
			 		}
			 		else if($id==0)
			 		{
			 			header( "Location:displayPosts.php?stuNumber=$stuNumber" );die;
			 		}
				}
		 }
		 else
		 {
		 	$query2="UPDATE posts SET postText='$postText',mediaName='$mediaName' WHERE stuNumber='$stuNumber' AND postId='$postId' LIMIT 1";
			$result2=mysqli_query($connection,$query2);
			if($result2)
			{
				move_uploaded_file($tmpName, $uploadTo.$mediaName);
				if($id==1)
				{
			 		header( "Location:profileInfo.php?stuNumber=$stuNumber" );die;
				}
		 		else if($id==0)
		 		{
		 			header( "Location:displayPost.php?stuNumber=$stuNumber" );die;
		 		}
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
div.edit	{
	background-color: rgba(255,255,255,0.3);
	border:2px solid gray;
}
form.editPost {
	background-color:rgba(255, 255, 255, 0.2);
	border:2px solid gray;
}
</style>
	<title>New Post</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
<center>
	<article>
    <h2>Edit Post</h2>
		<div class="edit">
		<?php 
			$query="SELECT stuNumber,postText,mediaName,name FROM posts WHERE postId='{$_GET['postId']}' AND stuNumber='{$_GET['stuNumber']}'";
			$usersInfo=mysqli_query($connection,$query);
			if($usersInfo)
			{
				$record=mysqli_fetch_assoc($usersInfo);
				if(!empty($record['mediaName']))
				{
					echo '<img src="images/postMedia/'.$record['mediaName'].'" height="auto" width="auto" title="photo" alt="photo" style="border:2px solid gray;"/>';
					echo '<br>';
					echo '<a href="deletePostPhoto.php?stuNumber='.$_GET['stuNumber'].'&postId='.$_GET['postId'].'&mediaName='.$record['mediaName'].'&id='.$_GET['id'].'"><input type="submit" value="Delete Photo" name="delComPhoto"></a>';
				}
			}
			 ?>
			 <form action="editPost.php?stuNumber=<?php echo $_GET['stuNumber']; ?>&postId=<?php echo $_GET['postId']; ?>&id=<?php echo $_GET['id']; ?>" method="post" class="editPost" enctype="multipart/form-data">
		<input type="file" name="mediaName" id=""><br>
		<textarea rows = "10" cols = "80" name = "postText"><?php echo $record['postText']; ?>
         </textarea><br>
		<input type="submit" value=" Save Changes " name="submit">
	 </form>
	 </div>
	</article>
    </center>
</body>
</html>
<?php include_once('includes/footer.php'); ?>