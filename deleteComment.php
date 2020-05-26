<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
<?php 
		 $stuNumber=$_GET['stuNumber'];
		 $commentId=$_GET['commentId'];
		 $postId=$_GET['postId'];
		 $name=$_GET['name'];
		 $my=$_GET['my'];
		 $mediaName=$_GET['mediaName'];
		 $comPhoto=$_GET['comPhoto'];
		 $id=$_GET['id'];
		 $uploadTo="images/comPhotos/";
		 
		 $query="DELETE FROM comments WHERE postId='$postId' AND commentId='$commentId' LIMIT 1";
		 $usersInfo=mysqli_query($connection,$query);
		 if($usersInfo)
		 {
		 	if(!empty($mediaName))
		 	{
		 		unlink($uploadTo.$comPhoto);
		 	}
		 	if($id==1)
		 	{
		 		header( "Location:profileInfo.php?stuNumber=$stuNumber" );die;
		 	}
		 	else if($id==0)
		 	{
		 		header( "Location:displayComments.php?stuNumber=$stuNumber&postId=$postId&mediaName=$mediaName&name=$name&id=$id&my=$my" );die;
		 	}
		 }
	 ?>