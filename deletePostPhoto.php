<?php include_once('includes/connection.php'); ?>
<?php 
	$stuNumber=$_GET['stuNumber'];
	$postId=$_GET['postId'];
	$uploadTo="images/postMedia/";
	$id=$_GET['id'];
	unlink($uploadTo.$_GET['mediaName']);
	$mediaName="";

	$query="UPDATE posts SET mediaName='$mediaName' WHERE stuNumber='$stuNumber' AND postId='$postId' LIMIT 1";
	$result=mysqli_query($connection,$query);

	if($result)
	{	
		header( "Location:editPost.php?stuNumber=$stuNumber&postId=$postId&id=$id" );die;
	}

 ?>