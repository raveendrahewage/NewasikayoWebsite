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
ul.profile {
	background-color:rgba(255, 255, 255, 0.3);
	border:2px solid gray;
	padding: 10px 10px 10px 10px;
	font-size: 20px;
	font-family: Comic Sans MS;
}
input[type=text], [type=password] {
  width: 20%;
  padding: 3px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: black;
  color: white;
  padding: 4px 20px;
  border: 1px solid black;
  border-radius: 4px;
  cursor: pointer;
  float: center;
}
input[type=submit]:hover {
  background-color: gray;
}
img.proPicture {
	border-radius: 50%;
}
div.lab{
    width:190px;
    display:inline-block;
    text-align:left;
}
div.data{
    width:200px;
    display:inline-block;
    text-align:left;
}
</style>
	<title>Profile Info</title>
	<link rel="stylesheet" href="css/main.css"> 
</head>
<body>
<center>
<article>
	<?php 
	$query="SELECT stuNumber,indNumber,firstName,lastName,email,photoName,phoNumber,birthday FROM users WHERE stuNumber='{$_GET['studentNumber']}'";
	$usersInfo=mysqli_query($connection,$query);
	if($usersInfo)
	{
		$record=mysqli_fetch_assoc($usersInfo);
		$name=$record['firstName']." ".$record['lastName'];
        $photo=$record['photoName'];
        echo '<h2>';
        echo $name;
        echo '</h2>';
		echo '<center>';
		echo '<ul class="profile">';
		if(!empty($record['photoName']))
		{
			echo '<img src="images/boaders/'.$record['photoName'].'" class="proPicture" height="200" title="Logo of a company" alt="photo" style="border:2px solid gray;"/>';
		}
		else
		{
			echo '<img src="images/unknown.png" class="proPicture" height="200" title="Logo of a company" alt="photo" style="border:2px solid gray;"/>';	
		}
		echo "<br>";
		echo '<div class="lab"><b>Student Number</b></div><div class="data">'.$record['stuNumber'].'</div><br>';
		echo '<div class="lab"><b>Index Number</b></div><div class="data">'.$record['indNumber'].'</div><br>';
        if($record['birthday']!="0000-00-00")
        {
            echo '<div class="lab"><b>Birthday</b></div><div class="data">'.$record["birthday"].'</div><br>';
        }
		echo '<div class="lab"><b>E-mail :</b></div><div class="data">'.$record['email'].'</div><br>';
		echo '<div class="lab"><b>Phone Number</b></div><div class="data">'.$record['phoNumber'].'<br>';
	}
	else
	{
	 	echo "Query failed.";
	} ?>
</ul>
	</center>
	<h2>Timeline</h2>
	<?php 
	$query="SELECT postId,stuNumber,postText,mediaName,name,postDate,postTime FROM posts WHERE stuNumber='{$_GET['studentNumber']}'";
	$usersInfo=mysqli_query($connection,$query);
	if($usersInfo)
	{
		$i=0;
		$records=mysqli_num_rows($usersInfo);
		if($records!=0)
		{
			while($i< $records)
			{	
				$record=mysqli_fetch_assoc($usersInfo);
				echo '<div class="posts">';
				echo '<div style="float:left;">';
                if(!empty($photo))
                {
                    echo '<img src="images/boaders/'.$photo.'" height="40" width="40" title="photo" alt="photo"  style="border:2px solid gray;border-radius:50%;">';
                }
                else
                {
                    echo '<img src="images/unknown.png" height="40" width="40" title="photo" alt="photo"  style="border:2px solid gray;border-radius:50%;">';
                }
                echo $name;
                echo '<br><div class="date" style="font-size:14px;text-align:right;">';
                echo $record['postDate']." at ".$record['postTime'];
                echo '</div>';
                echo '</div>';
				echo '<br><br><br><hr>';
				echo '<center>';
				if(!empty($record['mediaName']))
				{
					echo '<img src="images/postMedia/'.$record['mediaName'].'" height="auto" width="auto" title="photo" alt="photo" style="border:2px solid gray;"/>';
				}
				echo '<br>';
				echo $record['postText'];
				echo '<hr>';
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
				echo '<a href="displayComments1.php?studentNumber='.$_GET['studentNumber'].'&stuNumber='.$_GET['stuNumber'].'&postId='.$record['postId'].'&mediaName='.$record['mediaName'].'&name='.$record['name'].'&my=0"><input type="submit" value=" Comment " name="submit"></b></a>';
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
			echo "<center>No posts yet.</center>";
		}
	}
	else
	{
	 	echo "Query failed.";
	} ?>
    </center>
	</article>
    </center>
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>