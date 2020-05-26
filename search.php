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
}

</style>

	<title>Search Results</title>
	<link rel="stylesheet" href="css/main.css"> 
</head>
<body>
		<h2>Search Results of <?php echo $_POST['search']; ?></h2>
		<center>
	<article>
	<?php 
	$query="SELECT stuNumber,firstName,lastName,photoName FROM users";
	$usersInfo=mysqli_query($connection,$query);
	if($usersInfo)
	{
		$i=0;
		$records=mysqli_num_rows($usersInfo);
		while($i< $records)
		{	
			$record=mysqli_fetch_assoc($usersInfo);
			$name="{$record['firstName']} {$record['lastName']}";
			if($record['firstName']==$_POST['search'] || $record['lastName']==$_POST['search'] || $name==$_POST['search'])
			{
				if(!empty($record['photoName']))
				{
					echo '<img src="images/boaders/'.$record['photoName'].'" width="200" height="200" alt="photo" style="border:2px solid gray;">';
				}
				else
				{
					echo '<img src="images/unknown.png" height="200" title="Logo of a company" alt="photo" style="border:2px solid gray;"/>';	
				}
				$space=" ";
				echo '<br>';
				echo '<a href="othersProfile.php?stuNumber='.$record['stuNumber'].'"><b><input type="submit" value="'.$space.$record['firstName']." ".$record['lastName'].$space.'" name="submit"></a>';
				echo '<br>';
				$i++;
				if($i<$records)
				{
					echo '<hr>';
				}
			}
			else
			{
				echo '<center>';
				echo "No result found.";
				echo '</center>';
			}
		}
	}
	else
	{
	 	echo "Query failed.";
	} ?>
	</center>
	</article>
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>