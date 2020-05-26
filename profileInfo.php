<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
<?php
	if(isset($_POST['submit']))
	{   
			$stuNumber=$_GET['stuNumber'];
			//$indNumber=$_POST['indNumber'];
			$firstName=$_POST['firstName'];
            $birthday=$_POST['birthday'];
            $gender=$_POST['gender'];
			$lastName=$_POST['lastName'];
			$email=$_POST['email'];
			$phoNumber=$_POST['phoNumber'];
			if(!empty($_FILES['image']['name']))
			{
				$fileName=$_FILES['image']['name'];
				$tmpName=$_FILES['image']['tmp_name'];
				$uploadTo="images/boaders/";
				//$query3="UPDATE users SET stuNumber='$stuNumber',indNumber='$indNumber',firstName='$firstName',lastName='$lastName',email='$email',photoName='$fileName',phoNumber='$phoNumber' WHERE stuNumber='$stuNumber' LIMIT 1";
                $query3="UPDATE users SET firstName='$firstName',lastName='$lastName',email='$email',photoName='$fileName',phoNumber='$phoNumber' ,birthday='$birthday', gender='$gender' WHERE stuNumber='$stuNumber' LIMIT 1";
				$usersInfo1=mysqli_query($connection,$query3);
				move_uploaded_file($tmpName, $uploadTo.$fileName);
			}
			else
			{	
				//$query1="UPDATE users SET stuNumber='$stuNumber',indNumber='$indNumber',firstName='$firstName',lastName='$lastName',email='$email', phoNumber='$phoNumber' WHERE stuNumber='$stuNumber' LIMIT 1";
                $query1="UPDATE users SET firstName='$firstName',lastName='$lastName',email='$email', phoNumber='$phoNumber',birthday='$birthday',gender='$gender' WHERE stuNumber='$stuNumber' LIMIT 1";
				$usersInfo1=mysqli_query($connection,$query1);
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

body {
	background-image: url("images/background.png");
	background-repeat: repeat;
	background-size: contain;
	background-attachment: fixed;
}

img.proPicture {
	border-radius: 50%;
}
img.fit{
	width:95%;
	max-height:auto;
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
	$query="SELECT stuNumber,indNumber,firstName,lastName,email,photoName,phoNumber,birthday,gender FROM users WHERE stuNumber='{$_GET['stuNumber']}'";
	$usersInfo=mysqli_query($connection,$query);
	if($usersInfo)
	{
		$record=mysqli_fetch_assoc($usersInfo);
		$name=$record['firstName']." ".$record['lastName'];
        echo '<h2>';
        echo $name;
        echo '</h2>';
        echo '<center>';
		echo '<ul class="profile">';
        $photo=$record['photoName'];
		if(!empty($record['photoName']))
		{
			echo '<img class = "proPicture" src="images/boaders/'.$record['photoName'].'" height="200" title="photo" alt="photo" style="border:2px solid gray;" />';
		}
		else
		{
			echo '<img class = "proPicture" src="images/unknown.png" height="200" title="Logo of a company" alt="photo" style="border:2px solid gray;"/>';	
		}
		echo '<br>';
		echo '<div class="lab"><b>Student Number</b></div><div class="data">'.$record["stuNumber"].'</div><br>';
		echo '<div class="lab"><b>Index Number</b></div><div class="data">'.$record["indNumber"].'</div><br>';
        if($record['birthday']!="0000-00-00")
        {
            echo '<div class="lab"><b>Birthday</b></div><div class="data">'.$record["birthday"].'</div><br>';
        }
		echo '<div class="lab"><b>E-mail</b></div><div class="data">'.$record["email"].'</div><br>';
		echo '<div class="lab"><b>Phone Number</b></div><div class="data">'.$record["phoNumber"].'</div><hr>';
		echo '<a href="getDetails.php?stuNumber='.$record['stuNumber'].'&name='.$name.'&indNumber='.$record['indNumber'].'&firstName='.$record['firstName'].'&lastName='.$record['lastName'].'&email='.$record['email'].'&photoName='.$record['photoName'].'&phoNumber='.$record['phoNumber'].'&birthday='.$record['birthday'].'&gender='.$record['gender'].'"><input type="submit" value="  Edit Profile  " name="submit" ></b></a>';
	}
	else
	{
	 	echo "Query failed.";
	} ?>
	<a href="changePassword.php?stuNumber=<?php echo $record['stuNumber']; ?>&name=<?php echo $name; ?>"><input type="submit" value=" Change Password " name="submit"></b></a>
	<a href="deleteQuery.php?stuNumber=<?php echo $record['stuNumber']; ?>&name=<?php echo $name; ?>&photoName=<?php echo $record['photoName']; ?>"><input type="submit" value=" Delete Account " name="submit" onclick="return confirm('Are you sure?')"><br></a>
</ul>
	</center>
	<h2>My posts</h2>
	<center>
	<?php 
	$query="SELECT postId,stuNumber,postText,mediaName,name,postDate,postTime FROM posts WHERE stuNumber='{$_GET['stuNumber']}' ORDER BY postId DESC;";
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
				if(!empty($record['mediaName']))
				{
					echo '<img src="images/postMedia/'.$record['mediaName'].'" class="fit" title="photo" alt="photo" style="border:2px solid gray;" />';
				}
				echo '<br>';
				echo $record['postText'];
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
				echo '<a href="displayComments.php?stuNumber='.$_GET['stuNumber'].'&postId='.$record['postId'].'&mediaName='.$record['mediaName'].'&name='.$record['name'].'&my=1"><input type="submit" value=" Comment " name="submit"></b></a>';
				echo '<a href="editPost.php?stuNumber='.$record['stuNumber'].'&postId='.$record['postId'].'&id=1"><input type="submit" value=" Edit Post " name="submit"></b></a>';
				echo '<a href="deletePost.php?stuNumber='.$record['stuNumber'].'&name='.$name.'&postId='.$record['postId'].'&id=1"><input type="submit" value=" Delete Post " name="submit"></b></a>';
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