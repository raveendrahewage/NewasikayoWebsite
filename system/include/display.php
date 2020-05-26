<?php include_once('include/connection.php'); ?>
<?php 
	$query="SELECT id,firstName,lastName,email FROM users";
	$usersInfo=mysqli_query($connection,$query);
	if($usersInfo)
	{
		echo mysqli_num_rows($usersInfo)." Records found.<br><br>";
		$i=0;
		$records=mysqli_num_rows($usersInfo);
		$table='<table>';
		$table.='<tr><th>User ID</th><th>First Name</th><th>Last Name</th><th>E-mail</th></tr>';
		while($i<$records)
		{
			$record=mysqli_fetch_assoc($usersInfo);
			$table.='<tr>';
			$table.='<td>'.$record['id'].'</td>';
			$table.='<td>'.$record['firstName'].'</td>';
			$table.='<td>'.$record['lastName'].'</td>';
			$table.='<td>'.$record['email'].'</td>';
			$table.='<tr>';
			$i++;
		}
		$table.='</table>';
	}
	else
	{
	 	echo "Query failed.";
	} ?>
<!DOCTYPE html>
<html>
<head>
	<title>Select Query</title>
	<style>
		table { border-collapse: collapse; }
		td,th { border: 1px solid black; padding: 10px;}
	</style>
</head>
<body>
	<?php echo $table; ?>
</body>
</html>
<?php mysqli_close($connection); ?>