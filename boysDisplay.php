<?php include_once('includes/connection.php'); ?>
<?php require('includes/header1.php'); ?>
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
figure	{
	float: center;
	text-align: center;
}
table {
	table-layout: auto;
}
div {
	background-color:rgba(255, 255, 255, 0.3);
	border: 2px solid gray;
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
        <h2>Names</h2>
	<?php 
	$query="SELECT stuNumber,firstName,lastName,photoName FROM users";
	$usersInfo=mysqli_query($connection,$query);
	if($usersInfo)
	{
		$i=0;
		$records=mysqli_num_rows($usersInfo);
		while($i< $records)
		{	echo '<div>';
			$record=mysqli_fetch_assoc($usersInfo);
			$name="{$record['firstName']} {$record['lastName']}";
			if(!empty($record['photoName']))
			{
				echo '<img src="images/boaders/'.$record['photoName'].'" class="proPicture" height="200" title="Logo of a company" alt="photo" style="border:2px solid gray;"/>';
			}
			else
			{
				echo '<img src="images/unknown.png" class="proPicture" height="200" title="Logo of a company" alt="photo" style="border:2px solid gray;"/>';	
			}
			$space=" ";
			echo '<br><hr><b>';		
			echo $name;
			echo '</b><br>';
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
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>