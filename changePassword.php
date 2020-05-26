<?php include_once('includes/connection.php'); ?>
<?php require('includes/header.php'); ?>
<?php require('includes/greeting.php'); ?>
<?php
      if(isset($_POST['submit']))
      {
      	$oldPassword=md5($_POST['oldPassword']);
      	$newPassword1=$_POST['newPassword1'];
        $newPassword2=$_POST['newPassword2'];
        $stuNumber=$_GET['stuNumber'];

      	$query="SELECT stuNumber,password FROM users WHERE stuNumber='{$stuNumber}' AND password='{$oldPassword}'";
		    $usersInfo=mysqli_query($connection,$query);

     	    if(mysqli_num_rows($usersInfo) > 0)
     	    {
            if($newPassword1==$newPassword2)
            {
              $newPassword=md5($newPassword1);
              $query="UPDATE users SET password='$newPassword' WHERE stuNumber='$stuNumber' LIMIT 1";
              $usersInfo1=mysqli_query($connection,$query);
              header( "Location:profileInfo.php?stuNumber=$stuNumber" );die;
            }
            else
            {
              header( "Location:changePassword.php?stuNumber=$stuNumber" );die;
            }
          }
      	 else
      	 {
      		  echo "Incorrect Student Number or Password.";
      		  header( "Location:changePassword.php?stuNumber=$stuNumber" );die;	
      	 }
     }
   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
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
form.change {
  background-color:rgba(255, 255, 255, 0.3);
  border:2px solid gray;
  font-family: Comic Sans MS;
  font-size: 20px;
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
div.lable{
    width:280px;
    display:inline-block;
    text-align:left;
}

</style>
    <center>
		<article>
        <h2>Change Password</h2>
      <center>
			<form action="changePassword.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" method="post" class="change">
				<div class="lable"><b>Enter Old Password</b></div><input type="password" name="oldPassword" id="password" required=""><i class="far fa-eye" id="eye"></i><br>
				<div class="lable"><b>Enter New Password</b></div><input type="password" name="newPassword1" required="" id="password1"><i class="far fa-eye" id="eye1"></i><br>
        <div class="lable"><b>Re-enter New Password</b></div><input type="password" name="newPassword2" required="" id="password2"><i class="far fa-eye" id="eye2"></i><br>
				<input type="submit" value=" Change " name="submit">
	 </form>
	 </center>
		</article>
        <center>
</body>
</html>
<?php include_once('includes/footer.php'); ?>