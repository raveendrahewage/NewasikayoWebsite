<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
<?php 
	if(isset($_POST['submit']))
	{

		 $stuNumber=$_GET['stuNumber'];
		 $postId=$_GET['postId'];
		 $commentId=$_GET['commentId'];
		 $replyId=$_GET['replyId'];
		 $name=$_GET['name'];
		 $reply=$_POST['reply'];
		 $repPhoto=$_FILES['repPhoto']['name'];
		 $tmpName=$_FILES['repPhoto']['tmp_name'];
		 $uploadTo="images/repPhotos/";

		 if(empty($repPhoto))
		 {
		 		$query1="UPDATE replies SET reply='$reply' WHERE stuNumber='$stuNumber' AND replyId='$replyId' AND commentId='$commentId' LIMIT 1";
				$result1=mysqli_query($connection,$query1);
				if($result1)
				{
			 			header( "Location:displayReplies.php?stuNumber=$stuNumber&postId=$postId&comPhoto=$comPhoto&name=$name&commentId=$commentId&id=$id&my=$my" );die;
				}
		 }
		 else
		 {
		 	$query2="UPDATE replies SET reply='$reply',repPhoto='$repPhoto' WHERE stuNumber='$stuNumber' AND replyId='$replyId' AND commentId='$commentId' LIMIT 1";
			$result2=mysqli_query($connection,$query2);
			if($result2)
			{
				move_uploaded_file($tmpName, $uploadTo.$repPhoto);
		 		header( "Location:displayReplies.php?stuNumber=$stuNumber&postId=$postId&comPhoto=$comPhoto&name=$name&commentId=$commentId&id=$id&my=$my" );die;
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
			$query="SELECT stuNumber,commentId,postId,repPhoto,reply FROM replies WHERE replyId='{$_GET['replyId']}' AND commentId='{$_GET['commentId']}'";
			$usersInfo=mysqli_query($connection,$query);
			if($usersInfo)
			{
				$record=mysqli_fetch_assoc($usersInfo);
				if(!empty($record['comPhoto']))
				{
					echo '<img src="images/comPhotos/'.$record['comPhoto'].'" height="150" width="150" title="photo" alt="photo" style="border:2px solid gray;"/>';
					echo '<br>';
					echo '<a href="deleteRepPhoto.php?stuNumber='.$_GET['stuNumber'].'&postId='.$_GET['postId'].'&replyId='.$_GET['replyId'].'&name='.$_GET['name'].'&commentId='.$_GET['commentId'].'&comPhoto='.$record['comPhoto'].'&id=0&my='.$_GET['my'].'"><input type="submit" value="Delete Photo" name="delComPhoto"></a>';
				}
			}
			 ?>
			 <form action="editReply.php?stuNumber=<?php echo $_GET['stuNumber']; ?>&postId=<?php echo $_GET['postId']; ?>&replyId=<?php echo $_GET['replyId']; ?>&name=<?php echo $_GET['name']; ?>&commentId=<?php echo $_GET['commentId']; ?>&id=0&my=<?php echo $_GET['my'] ?>" method="post" class="editCom" enctype="multipart/form-data">
				<input type="file" name="repPhoto" id=""><br>
				<textarea rows="5" cols="80" name="reply"><?php echo $record['reply']; ?>
         		</textarea><br>
				<input type="submit" value=" Save Changes " name="submit">
	 		</form>
	 	</div>
	</article>
    </center>
</body>
</html>
<?php include_once('includes/footer.php'); ?>