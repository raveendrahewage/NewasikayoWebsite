<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
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
img.fit{
	width:95%;
	max-height:auto;
}


</style>

	<title>Posts</title>
	<link rel="stylesheet" href="css/main.css"> 
</head>
<body>
<center>
	<article>
    <h2>Posts</h2>
	<?php 
	$query="SELECT stuNumber,postText,mediaName,name,postId,postDate,postTime FROM posts ORDER BY postId DESC;";
	$usersInfo=mysqli_query($connection,$query);

	if($usersInfo)
	{
		$i=0;
		$records=mysqli_num_rows($usersInfo);
		while($i< $records)
		{ 
			$record=mysqli_fetch_assoc($usersInfo);
			$query1="SELECT photoName FROM users WHERE stuNumber='{$record['stuNumber']}'";
			$usersInfo1=mysqli_query($connection,$query1);

			$record1=mysqli_fetch_assoc($usersInfo1);
			echo '<div class="posts">';
            echo '<div style="float:left;">';
			if(!empty($record1['photoName']))
			{
				echo '<a href="othersProfile.php?studentNumber='.$record['stuNumber'].'&name='.$record['name'].'&stuNumber='.$_GET['stuNumber'].'"><img src="images/boaders/'.$record1['photoName'].'" height="40" width="40" title="photo" alt="photo"  style="border:2px solid gray;border-radius:50%;"></a>';
			}
			else
			{
				echo '<a href="othersProfile.php?studentNumber='.$record['stuNumber'].'&name='.$record['name'].'&stuNumber='.$_GET['stuNumber'].'"><img src="images/unknown.png" height="auto" width="40" title="40" alt="photo" style="border:2px solid gray;border-radius:50%;"></a>';
			}
			echo '<a href="othersProfile.php?studentNumber='.$record['stuNumber'].'&name='.$record['name'].'&stuNumber='.$_GET['stuNumber'].'"><b>'.$record['name'].'</b></a>';
            echo '<br><div class="date" style="font-size:14px;text-align:right;">';
            echo $record['postDate']." at ".$record['postTime'];
            echo '</div>';
            echo '</div>';
			echo '<br><br><br><hr>';
			echo '<center>';
			if(!empty($record['mediaName']))
			{
				echo '<div class="image">';
				echo '<img data-original="images/postMedia/'.$record['mediaName'].'" title="photo" alt="photo" class="fit" style="border:2px solid gray;"/>';
				echo '<div>';
			}
			echo '<br>';
			if(!empty($record['postText']))
			{
				echo $record['postText'];
			}
			echo '<br><hr>';
			$query3="SELECT comment FROM comments WHERE postId={$record['postId']}";
			$result3=mysqli_query($connection,$query3);
			$record3=mysqli_num_rows($result3);
			if($record3==0)
			{
				echo "<i>No comments yet.</i>";
			}
			else if($record3==1)
			{
                echo '<a href="displayComments.php?stuNumber='.$_GET['stuNumber'].'&postId='.$record['postId'].'&mediaName='.$record['mediaName'].'&name='.$record['name'].'&my=1"><i>'.$record3.' comment</b></a>';
			}
            else if($record3>1)
            {
                echo '<a href="displayComments.php?stuNumber='.$_GET['stuNumber'].'&postId='.$record['postId'].'&mediaName='.$record['mediaName'].'&name='.$record['name'].'&my=1"><i>'.$record3.' comments</i>"</b></a>';
            }
            echo '<br>';
			if($record['stuNumber']==$_GET['stuNumber'])
			{
				echo '<a href="displayComments.php?stuNumber='.$_GET['stuNumber'].'&postId='.$record['postId'].'&mediaName='.$record['mediaName'].'&name='.$record['name'].'&my=1"><input type="submit" value=" Comment " name="submit"></b></a>';
			}
			else {
				echo '<a href="displayComments.php?stuNumber='.$_GET['stuNumber'].'&postId='.$record['postId'].'&mediaName='.$record['mediaName'].'&name='.$record['name'].'&my=0"><input type="submit" value=" Comment " name="submit"></b></a>';
			}
			if($record['stuNumber']==$_GET['stuNumber'])
			{
				echo '<a href="editPost.php?stuNumber='.$record['stuNumber'].'&postId='.$record['postId'].'&id=0"><input type="submit" value=" Edit Post " name="submit"></b></a>';
				echo '<a href="deletePost.php?stuNumber='.$_GET['stuNumber'].'&postId='.$record['postId'].'&mediaName='.$record['mediaName'].'&id=0"><input type="submit" value=" Delete Post " name="submit"></b></a>';
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
	 	echo "Query failed.";
	} ?>
	</article>
    </center>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha256-rXnOfjTRp4iAm7hTAxEz3irkXzwZrElV2uRsdJAYjC4=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $('img.fit').lazyload();
        });
    </script>-->
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>