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
	background: white;
}
</style>
	<title><?php echo "Add"; ?></title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
<center>
	<article>
    <h2>Add Details</h2>
	<form action="insertQuery.php" method="post" enctype="multipart/form-data">
		<b>Student Number :</b> <input type="text" name="stuNumber" id="" required=""><br>
		<b>Index Number :</b> <input type="text" name="indNumber" id="" required=""><br>
		<b>First Name :</b> <input type="text" name="firstName" id="" required=""><br>
		<b>Last Name :</b> <input type="text" name="lastName" id="" required=""><br>
		<b>E-mail :</b> <input type="email" name="email" id=""><br>
		<input type="file" name="image" id=""><br>
		<input type="submit" value=" Add " name="submit">
	 </form>
	 </article>
    </center>
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>