<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
<?php 
		 $stuNumber=$_GET['stuNumber'];
		 $commentId=$_GET['commentId'];
		 $postId=$_GET['postId'];
		 $replyId=$_GET['replyId'];
		 $name=$_GET['name'];
		 $commentId=$_GET['commentId'];
		 $my=$_GET['my'];
		 $comPhoto=$_GET['comPhoto'];
		 $repPhoto=$_GET['repPhoto'];
		 $id=$_GET['id'];
		 $uploadTo="images/repPhotos/";
		 
		 $query="DELETE FROM replies WHERE commentId='$commentId' AND replyId='$replyId' LIMIT 1";
		 $usersInfo=mysqli_query($connection,$query);
		 if($usersInfo)
		 {
		 	if(!empty($repPhoto))
		 	{
		 		unlink($uploadTo.$repPhoto);
		 	}
		 	header( "Location:displayReplies.php?stuNumber=$stuNumber&postId=$postId&comPhoto=$comPhoto&name=$name&commentId=$commentId&id=$id&my=$my" );die;
		 }
	 ?>