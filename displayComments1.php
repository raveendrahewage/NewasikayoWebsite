<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
<?php 
	if(isset($_POST['submit']))
	{
		$comment=$_POST['newComment'];
		$comPhoto=$_FILES['comPhoto']['name'];
		$tmpName=$_FILES['comPhoto']['tmp_name'];
		$stuNumber=$_GET['stuNumber'];
		$postId=$_GET['postId'];
        date_default_timezone_set("Sri_Lanka/Sri_Jayawardenapura_Kotte");
        $commentDate=date("Y-m-d");
        $commentTime=date("h:i:s");
		$uploadTo="images/comPhotos/";

		$query="INSERT INTO comments (postId,stuNumber,comment,comPhoto,commentDate,commentTime)VALUES('{$postId}','{$stuNumber}','{$comment}','{$comPhoto}','{$commentDate}','{$commentTime}')";
		$result=mysqli_query($connection,$query);
		if(!empty($comPhoto))
		{
			move_uploaded_file($tmpName, $uploadTo.$comPhoto);
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
div.posts {
	background-color:rgba(255, 255, 255, 0.3);
	border:2px solid gray;
	padding: 10px 10px 10px 10px;
	font-size: 20px;
	font-family: Comic Sans MS;
}
div.postImg,.frame { 
	background-color:rgba(255, 255, 255, 0.3);
	border:2px solid gray;
	padding: 10px 10px 10px 10px;
	font-size: 20px;
	font-family: Comic Sans MS;
}
form.newCom {
	background-color:rgba(255, 255, 255, 0.2);
	border:2px solid gray;
}
img.comImg {
	width:25%;
	max-height:auto;
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

	<title>Comments</title>
	<link rel="stylesheet" href="css/main.css"> 
</head>
<body>
<center>
	<article>
    <h2>Comments</h2>
	<?php 

	echo '<div class="postImg" ><center>';
	if(!empty($_GET['mediaName']))
	{
		echo '<img src="images/postMedia/'.$_GET['mediaName'].'" title="photo" width="150" height="150" alt="photo" style="border:2px solid gray;"/>';
	}
	$query2="SELECT postText FROM posts WHERE postId={$_GET['postId']}";
	$postInfo=mysqli_query($connection,$query2);
	$record2=mysqli_fetch_assoc($postInfo);
	echo '<br>';
	echo $record2['postText'];
	

	echo '<center><form action="displayComments1.php?studentNumber='.$_GET['studentNumber'].'&stuNumber='.$_GET['stuNumber'].'&postId='.$_GET['postId'].'&mediaName='.$_GET['mediaName'].'&name='.$_GET['name'].'&my=0" method="post" class="newCom" enctype="multipart/form-data" class="post">
		<p><b>Upload a photo</b></p>
        <canvas id="canvas"></canvas><br>
		<input type="file" name="comPhoto" id="photoName"><br>
		<textarea rows = "5" cols = "80" name = "newComment">
         </textarea><br>
		<input type="submit" value=" Add Comment " name="submit">
	 </form></center>';
	 echo '</center></div>';

	$query="SELECT stuNumber,comment,comPhoto,postId,commentId,commentDate,commentTime FROM comments WHERE postId={$_GET['postId']} ORDER BY commentId DESC;";
	$usersInfo=mysqli_query($connection,$query);

	if($usersInfo)
	{
		$i=0;
		$records=mysqli_num_rows($usersInfo);
		while($i< $records)
		{
			$record=mysqli_fetch_assoc($usersInfo);
			$query1="SELECT firstName,lastName,photoName FROM users WHERE stuNumber='{$record['stuNumber']}'";
			$usersInfo1=mysqli_query($connection,$query1);
			$record1=mysqli_fetch_assoc($usersInfo1);
			$name=$record1['firstName']." ".$record1['lastName'];
			echo '<div class="frame">';
            echo '<div style="float:left;">';
			if(!empty($record1['photoName']))
			{
				echo '<a href="othersProfile.php?studentNumber='.$record['stuNumber'].'&stuNumber='.$_GET['stuNumber'].'"><img src="images/boaders/'.$record1['photoName'].'" height="40" width="40" title="photo" alt="photo" style="border:2px solid gray;border-radius:50%;"></a>';
			}
			else
			{
				echo '<a href="othersProfile.php?studentNumber='.$record['stuNumber'].'&name='.$record['name'].'&stuNumber='.$_GET['stuNumber'].'"><img src="images/unknown.png" height="auto" width="40" title="40" alt="photo" style="border:2px solid gray;border-radius:50%;"></a>';
			}
			echo '<a href="othersProfile.php?studentNumber='.$record['stuNumber'].'&stuNumber='.$_GET['stuNumber'].'"><b>'.$name.'</b></a>';
            echo '<br><div class="date" style="font-size:14px;text-align:right;">';
            echo $record['commentDate']." at ".$record['commentTime'];
            echo '</div>';
            echo '</div>';
			echo '<br><br><br><hr>';
			echo '<center>';
			if(!empty($record['comPhoto']))
			{
				echo '<img src="images/comPhotos/'.$record['comPhoto'].'" height="300" class="comImg" alt="photo" style="border:2px solid gray;"/>';
			}
			echo '<br>';
			if(!empty($record['comment']))
			{
				echo $record['comment'];
			}
			echo '<hr>';

            $query3="SELECT reply FROM replies WHERE commentId={$record['commentId']}";
			$result3=mysqli_query($connection,$query3);
			$record3=mysqli_num_rows($result3);
			if($record3==0)
			{
				echo "<i>No replies yet.</i>";
			}
			else if($record3==1)
			{
				echo '<a href="displayReplies.php?stuNumber='.$_GET['stuNumber'].'&postId='.$_GET['postId'].'&comPhoto='.$record['comPhoto'].'&name='.$_GET['name'].'&commentId='.$record['commentId'].'&id=0&my='.$_GET['my'].'"><i>'.$record3.' reply</i></b></a>';
			}
            else if($record3>1)
            {
                echo '<a href="displayReplies.php?stuNumber='.$_GET['stuNumber'].'&postId='.$_GET['postId'].'&comPhoto='.$record['comPhoto'].'&name='.$_GET['name'].'&commentId='.$record['commentId'].'&id=0&my='.$_GET['my'].'"><i>'.$record3.' replies</i></b></a>';
            }
            echo '<br>';
			
			echo '<a href="displayReplies.php?stuNumber='.$_GET['stuNumber'].'&postId='.$_GET['postId'].'&comPhoto='.$record['comPhoto'].'&name='.$_GET['name'].'&commentId='.$record['commentId'].'&id=0&my='.$_GET['my'].'"><input type="submit" value=" Reply " name="submit"></b></a>';

			if($_GET['my']==1)
			{
				echo '<a href="deleteComment.php?stuNumber='.$_GET['stuNumber'].'&postId='.$_GET['postId'].'&mediaName='.$_GET['mediaName'].'&name='.$_GET['name'].'&comPhoto='.$record['comPhoto'].'&commentId='.$record['commentId'].'&id=0&my='.$_GET['my'].'"><input type="submit" value=" Delete Comment " name="submit"></b></a>';
			}
			else
			{
				if($record['stuNumber']==$_GET['stuNumber'])
				{
					echo '<a href="editComment1.php?studentNumber='.$_GET['studentNumber'].'&stuNumber='.$_GET['stuNumber'].'&postId='.$record['postId'].'&commentId='.$record['commentId'].'&mediaName='.$_GET['mediaName'].'&name='.$_GET['name'].'&id=0"><input type="submit" value=" Edit Comment " name="submit"></b></a>';
					echo '<a href="deleteComment.php?stuNumber='.$_GET['stuNumber'].'&postId='.$_GET['postId'].'&mediaName='.$_GET['mediaName'].'&name='.$_GET['name'].'&comPhoto='.$record['comPhoto'].'&commentId='.$record['commentId'].'&id=0&my='.$_GET['my'].'"><input type="submit" value=" Delete Comment " name="submit"></b></a>';
				}
			}
            echo '</center>';
			echo '</div>';
			$i++;
			if($i<$records)
			{
				echo '<hr>';
			}
		}
	}
	else
	{
	 	echo "No comments yet.";
	}
	//echo '</div>';
	 ?>
	</article>
    </center>
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>