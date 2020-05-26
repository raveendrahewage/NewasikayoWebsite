<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
<?php 
		 $stuNumber=$_GET['stuNumber'];
		 $postId=$_GET['postId'];
		 $id=$_GET['id'];
		 $uploadTo="images/postMedia/";
		 
		 $query="DELETE FROM posts WHERE stuNumber='$stuNumber' AND postId='$postId' LIMIT 1";
		 $usersInfo=mysqli_query($connection,$query);
		 if($usersInfo)
		 {
		 	unlink($uploadTo.$_GET['mediaName']);
		 	if($id==1)
		 	{
		 		header( "Location:profileInfo.php?stuNumber=$stuNumber" );die;
		 	}
		 	else if($id==0)
		 	{
		 		header( "Location:displayPosts.php?stuNumber=$stuNumber" );die;
		 	}
		 }
	 ?>