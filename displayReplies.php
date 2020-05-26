<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
<?php 
	if(isset($_POST['submit']))
	{
		$reply=$_POST['newReply'];
		$commentId=$_GET['commentId'];
		$repPhoto=$_FILES['repPhoto']['name'];
		$tmpName=$_FILES['repPhoto']['tmp_name'];
		$stuNumber=$_GET['stuNumber'];
		$postId=$_GET['postId'];
        date_default_timezone_set("Sri_Lanka/Sri_Jayawardenapura_Kotte");
        $replyDate=date("Y-m-d");
        $replyTime=date("h:i:s");
		$uploadTo="images/repPhotos/";

		$query="INSERT INTO replies (commentId,postId,stuNumber,reply,repPhoto,replyDate,replyTime)VALUES('{$commentId}','{$postId}','{$stuNumber}','{$reply}','{$repPhoto}','{$replyDate}','{$replyTime}')";
		$result=mysqli_query($connection,$query);
		if(!empty($repPhoto))
		{
			move_uploaded_file($tmpName, $uploadTo.$repPhoto);
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

	<title>Replies</title>
	<link rel="stylesheet" href="css/main.css"> 
</head>
<body>
<center>
	<article>
    <h2>Replies</h2>
	<?php 

	echo '<div class="postImg" >';
	if(!empty($_GET['comPhoto']))
	{
		echo '<img src="images/comPhotos/'.$_GET['comPhoto'].'" title="photo" width="150" height="150" alt="photo" style="border:2px solid gray;"/>';
	}
	$query2="SELECT comment FROM comments WHERE commentId={$_GET['commentId']}";
	$postInfo=mysqli_query($connection,$query2);
	$record2=mysqli_fetch_assoc($postInfo);
	echo '<br>';
	echo $record2['comment'];
	

	echo '<center><form action="displayReplies.php?stuNumber='.$_GET['stuNumber'].'&postId='.$_GET['postId'].'&comPhoto='.$_GET['comPhoto'].'&name='.$_GET['name'].'&commentId='.$_GET['commentId'].'&id=0&my='.$_GET['my'].'" method="post" class="newCom" enctype="multipart/form-data" class="post">
		<p><b>Upload a photo</b></p>
        <canvas id="canvas"></canvas><br>
		<input type="file" name="repPhoto" id="photoName"><br>
		<textarea rows = "5" cols = "80" name = "newReply">
         </textarea><br>
		<input type="submit" value=" Add Reply " name="submit">
	 </form></center>';
	 echo '</div>';

	$query="SELECT stuNumber,replyId,reply,repPhoto,postId,commentId,replyDate,replyTime FROM replies WHERE commentId={$_GET['commentId']} ORDER BY replyId DESC;";
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
			if($record['stuNumber']==$_GET['stuNumber'])
			{
				if(!empty($record1['photoName']))
				{
					echo '<a href="profileInfo.php?stuNumber='.$_GET['stuNumber'].'"><img src="images/boaders/'.$record1['photoName'].'" height="40" width="40" title="photo" alt="photo" style="border:2px solid gray;border-radius:50%;"></a>';
				}
				else
				{
					echo '<a href="profileInfo.php?studentNumber=stuNumber='.$_GET['stuNumber'].'"><img src="images/unknown.png" height="auto" width="40" title="40" alt="photo" style="border:2px solid gray;border-radius:50%;"></a>';
				}

				echo '<a href="profileInfo.php?stuNumber='.$_GET['stuNumber'].'"><b>'.$name.'</b></a>';
			}
			else
			{
				if(!empty($record1['photoName']))
				{
					echo '<a href="othersProfile.php?studentNumber='.$record['stuNumber'].'&stuNumber='.$_GET['stuNumber'].'"><img src="images/boaders/'.$record1['photoName'].'" height="40" width="40" title="photo" alt="photo" style="border:2px solid gray;border-radius:50%;"></a>';
				}
				else
				{
					echo '<a href="othersProfile.php?studentNumber='.$record['stuNumber'].'&name='.$record['name'].'&stuNumber='.$_GET['stuNumber'].'"><img src="images/unknown.png" height="auto" width="40" title="40" alt="photo" style="border:2px solid gray;border-radius:50%;"></a>';
				}

				echo '<a href="othersProfile.php?studentNumber='.$record['stuNumber'].'&stuNumber='.$_GET['stuNumber'].'"><b>'.$name.'</b></a>';
			}
            echo '<br><div class="date" style="font-size:14px;text-align:right;">';
            echo $record['replyDate']." at ".$record['replyTime'];
            echo '</div>';
            echo '</div>';
			echo '<br><br><br><hr>';
			echo '<center>';
			if(!empty($record['repPhoto']))
			{
				echo '<img src="images/repPhotos/'.$record['repPhoto'].'" height="300" class="comImg" alt="photo" style="border:2px solid gray;"/>';
			}
			echo '<br>';
			if(!empty($record['reply']))
			{
				echo $record['reply'];
			}
			echo '<hr>';
			
			if($_GET['my']==1)
			{
				echo '<a href="deleteReply.php?stuNumber='.$_GET['stuNumber'].'&postId='.$_GET['postId'].'&replyId='.$record['replyId'].'&name='.$_GET['name'].'&repPhoto='.$record['repPhoto'].'&comPhoto='.$_GET['comPhoto'].'&commentId='.$_GET['commentId'].'&id=0&my='.$_GET['my'].'"><input type="submit" value=" Delete Reply " name="submit"></b></a>';
			}
			else
			{
				if($record['stuNumber']==$_GET['stuNumber'])
				{
					echo '<a href="editReply.php?stuNumber='.$_GET['stuNumber'].'&postId='.$_GET['postId'].'&commentId='.$_GET['commentId'].'&replyId='.$record['replyId'].'&name='.$_GET['name'].'&id=0&my='.$_GET['my'].'"><input type="submit" value=" Edit Reply " name="submit"></b></a>';
					echo '<a href="deleteReply.php?stuNumber='.$_GET['stuNumber'].'&postId='.$_GET['postId'].'&commentId='.$_GET['commentId'].'&name='.$_GET['name'].'&repPhoto='.$record['repPhoto'].'&comPhoto='.$_GET['comPhoto'].'&replyId='.$record['replyId'].'&id=0&my='.$_GET['my'].'"><input type="submit" value=" Delete Reply " name="submit"></b></a>';
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