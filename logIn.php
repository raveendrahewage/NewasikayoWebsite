<?php include_once('includes/connection.php'); ?>
<?php require('includes/header1.php'); ?>
<?php require('includes/greeting.php'); ?>
<?php
      if(isset($_POST['submit']))
      {
      	$stuNumber=$_POST['stuNumber'];
      	$password=md5($_POST['password']);

      	$query="SELECT stuNumber,password FROM users WHERE stuNumber='{$stuNumber}' AND password='{$password}'";
		$usersInfo=mysqli_query($connection,$query);
     	if(mysqli_num_rows($usersInfo) > 0)
     	{
    		header( "Location:home.php?stuNumber=$stuNumber" );die;
      	}
      	else
      	{
      		echo "Incorrect Student Number or Password.";
      		header( "Location:logIn.php" );die;	
      	}
     }
   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Hostel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
	<style>
h1 {
	color:black;
  text-align: center;
}

p.date {
  text-align: right;
}

p.main {
  text-align: center;
}
body {
  background-image: url("images/background.png");
  background-repeat: repeat;
  background-size: contain;
  background-attachment: fixed;
}
nav {
	background: lightgray;
}
form.log {
  background-color:rgba(255, 255, 255, 0.3);
  border:2px solid gray;
  padding: 10px 10px 10px 10px;
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
</style>
</head>
<body>
	<style type="text/css">
img.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
div.lable{
    width:150px;
    display:inline-block;
    text-align:left;
}
</style>
	<main>
		<article>
        <h2>Log In</h2>
			<center>
			<form action="logIn.php" method="post" class="log" id="loginform" onSubmit="return check1()">
                <p id="alert1" style="display:none;color:red;"></p>
				<div class="lable"><b>Student Number</b></div><input type="text" name="stuNumber" id="stuNumber"><br>
                <p id="alert2" style="display:none;color:red;"></p>
				<div class="lable" style="width:110px;padding:0px 40px 0px 35px;"><b>Password</b></div><input type="password" name="password" id="password"><i class="far fa-eye" id="eye" ></i><br>
				<input type="submit" value=" Log In " name="submit">
	 </form>
	 </center>
	 <a href="createAccount.php"><input type="submit" name="Create an account" value=" Create an account "></a>
		</article>
	</main>
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>