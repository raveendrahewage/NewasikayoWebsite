<?php include_once('includes/connection.php'); ?>
<?php 
	$stuNumber=$_GET['stuNumber'];
	$postId=$_GET['postId'];
	$mediaName=$_GET['mediaName'];
	$name=$_GET['name'];
	$commentId=$_GET['commentId'];
	$uploadTo="images/comPhotos/";
	unlink($uploadTo.$_GET['comPhoto']);
	$comPhoto="";

	$query="UPDATE comments SET comPhoto='$comPhoto' WHERE stuNumber='$stuNumber' AND postId='$postId' AND commentId='$commentId' LIMIT 1";
	$result=mysqli_query($connection,$query);

	if($result)
	{
		header( "Location:editComment1.php?stuNumber=$stuNumber&postId=$postId&mediaName=$mediaName&name=$mediaName&commentId=$commentId" );die;
	}

 ?>