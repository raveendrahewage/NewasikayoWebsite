<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
<?php 
	if(isset($_POST['submit']))
	{

		 $stuNumber=$_GET['stuNumber'];
		 $postId=$_GET['postId'];
		 $commentId=$_GET['commentId'];
		 $mediaName=$_GET['mediaName'];
		 $name=$_GET['name'];
		 $id=$_GET['id'];
		 $my=$_GET['my'];
		 $comment=$_POST['comment'];
		 $comPhoto=$_FILES['comPhoto']['name'];
		 $tmpName=$_FILES['comPhoto']['tmp_name'];
		 $uploadTo="images/comPhotos/";

		 if(empty($comPhoto))
		 {
		 		$query1="UPDATE comments SET comment='$comment' WHERE stuNumber='$stuNumber' AND postId='$postId' AND commentId='$commentId' LIMIT 1";
				$result1=mysqli_query($connection,$query1);
				if($result1)
				{
			 			header( "Location:displayComments.php?stuNumber=$stuNumber&postId=$postId&mediaName=$mediaName&name=$mediaName&id=$id&my=$my" );die;
				}
		 }
		 else
		 {
		 	$query2="UPDATE comments SET comment='$comment',comPhoto='$comPhoto' WHERE stuNumber='$stuNumber' AND postId='$postId' AND commentId='$commentId' LIMIT 1";
			$result2=mysqli_query($connection,$query2);
			if($result2)
			{
				move_uploaded_file($tmpName, $uploadTo.$comPhoto);
		 		header( "Location:displayComments.php?stuNumber=$stuNumber&postId=$postId&mediaName=$mediaName&name=$mediaName&id=$id&my=$my" );die;
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
div	{
	background-color: rgba(255,255,255,0.3);
	border:2px solid gray;
}
form.editCom {
	background-color:rgba(255, 255, 255, 0.2);
	border:2px solid gray;
}
</style>
	<title>Edit Comment</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<center>
	<article>
    <h2>Edit Comment</h2>
		<div>
		<?php 
			$query="SELECT stuNumber,commentId,postId,comPhoto,comment FROM comments WHERE postId='{$_GET['postId']}' AND commentId='{$_GET['commentId']}'";
			$usersInfo=mysqli_query($connection,$query);
			if($usersInfo)
			{
				$record=mysqli_fetch_assoc($usersInfo);
				if(!empty($record['comPhoto']))
				{
					echo '<img src="images/comPhotos/'.$record['comPhoto'].'" height="150" width="150" title="photo" alt="photo" style="border:2px solid gray;"/>';
					echo '<br>';
					echo '<a href="deleteComPhoto.php?stuNumber='.$_GET['stuNumber'].'&postId='.$_GET['postId'].'&mediaName='.$_GET['mediaName'].'&name='.$_GET['name'].'&commentId='.$_GET['commentId'].'&comPhoto='.$record['comPhoto'].'"><input type="submit" value="Delete Photo" name="delComPhoto"></a>';
				}
			}
			 ?>
			 <form action="editComment.php?stuNumber=<?php echo $_GET['stuNumber']; ?>&postId=<?php echo $_GET['postId']; ?>&mediaName=<?php echo $_GET['mediaName']; ?>&name=<?php echo $_GET['name']; ?>&commentId=<?php echo $_GET['commentId']; ?>" method="post" class="editCom" enctype="multipart/form-data">
				<input type="file" name="comPhoto" id=""><br>
				<textarea rows="5" cols="80" name="comment"><?php echo $record['comment']; ?>
         		</textarea><br>
				<input type="submit" value=" Save Changes " name="submit">
	 		</form>
	 	</div>
	</article>
</center>
</body>
</html>
<?php include_once('includes/footer.php'); ?>