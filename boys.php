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
div.xxx {
	background-color:rgba(255, 255, 255, 0.3);
	border:2px solid gray;
	padding: 10px 10px 10px 10px;
	font-size: 20px;
	font-family: Comic Sans MS
}
.proPicture {
	border-radius: 50%;
}
</style>

	<title>Names</title>
	<link rel="stylesheet" href="css/main.css"> 
</head>
<body>
		<center>
	<article>
    <h2>Boaders</h2>
	<?php 
	$query="SELECT stuNumber,firstName,lastName,photoName FROM users";
	$usersInfo=mysqli_query($connection,$query);
	if($usersInfo)
	{
		$i=0;
		$records=mysqli_num_rows($usersInfo);
		while($i< $records-1)
		{	
			$record=mysqli_fetch_assoc($usersInfo);
			if($record['stuNumber']!=$_GET['stuNumber'])
			{
				echo '<div class="xxx">';
				$name="{$record['firstName']} {$record['lastName']}";
				if(!empty($record['photoName']))
				{
					echo '<img src="images/boaders/'.$record['photoName'].'" class="proPicture" width="200" height="200" alt="photo" style="border:2px solid gray;">';
				}
				else
				{
					echo '<img src="images/unknown.png" class="proPicture" height="200" title="Logo of a company" alt="photo"style="border:2px solid gray;" />';	
				}
				$space=" ";
				echo '<br><hr>';
				echo '<a href="othersProfile.php?studentNumber='.$record['stuNumber'].'&name='.$name.'&stuNumber='.$_GET['stuNumber'].'"><b>'.$record['firstName']." ".$record['lastName'].'</b></b></a>';
				echo '<br>';
				$i++;
				echo '</div>';
				if($i<$records-1)
				{
					echo '<hr>';
				}
			}
		}
	}
	else
	{
	 	echo "Query failed.";
	} ?>
	</article>
    </center>
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>