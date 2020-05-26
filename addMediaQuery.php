<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
<?php 
	$fileName=$_FILES['image']['name'];
	$fileType=$_FILES['image']['type'];
	$fileSize=$_FILES['image']['size'];
	$tmpName=$_FILES['image']['tmp_name'];
	$uploadTo='images/memories/';

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
}

</style>

	<title>Memories</title>
	<link rel="stylesheet" href="css/main.css"> 
</head>
<body>
<center>
	<article>
		<h2>Memories</h2>
	<?php
	if(!empty($fileName))
	{
		$query1="INSERT INTO memories (mediaName)VALUES('{$fileName}')";
		$result1=mysqli_query($connection,$query1);
		if($result1)
		{
			move_uploaded_file($tmpName, $uploadTo.$fileName);
			$query="SELECT mediaName FROM memories";
			$usersInfo=mysqli_query($connection,$query);
			if($usersInfo)
			{
				$i=1;
				$j=1;
				$records=mysqli_num_rows($usersInfo);
				while($i<= $records)
				{	
					if($j%6!=0)
					{
						if($j==1)
						{
							echo '<tr>';
						}
	
						$record=mysqli_fetch_assoc($usersInfo);
						echo '<img src="images/memories/'.$record['mediaName'].'" width="200" height="200" alt="photo" style="border:2px solid gray;">';
						echo "</figure>";
						echo '</td>';
						$j++;
					}
					else
					{
						$j=1;
						echo '</tr>';
					}
					$i++;
				}
			}
			else
			{
		 		echo "Query failed.";
			}
		}
		else
		{
			echo "Query failed."; 
		}
	}
	else
	{
		echo "You havent select any media!";
	}
	
	 ?>
	</article>
</center>
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>