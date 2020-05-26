<?php include_once('includes/connection.php'); ?>
<?php require('includes/header1.php'); ?>
<?php
      if(isset($_POST['submit']))
      { 

                $password1=$_POST['password1'];
                $password2=$_POST['password2'];
                $stuNumber=$_POST['stuNumber'];
                $gender=$_POST['gender'];
                $birthday=$_POST['birthday'];
                $email=$_POST['email'];
                $firstName=$_POST['firstName'];
                $lastName=$_POST['lastName'];
                $indNumber=$_POST['indNumber'];
                $phoNumber=$_POST['phoNumber'];
                $photoName=$_FILES['photoName']['name'];
                $tmpName=$_FILES['photoName']['tmp_name'];
                $uploadTo="images/boaders/";

                if(strlen($stuNumber)==9)
                {
                    if(strlen($indNumber)==8)
                    {
                        if($password1==$password2)
                        {
                            $password=md5($password1);
                            $query1="INSERT INTO users (stuNumber,indNumber,firstName,lastName,email,photoName,password,phoNumber,birthday,gender)VALUES('{$stuNumber}','{$indNumber}','{$firstName}','{$lastName}','{$email}','{$photoName}','{$password}','{$phoNumber}','{$birthday}','{$gender}')";
                            $result1=mysqli_query($connection,$query1);

                            if($result1)
                            {
                                move_uploaded_file($tmpName, $uploadTo.$photoName);
                                header( "Location:home.php?stuNumber=$stuNumber" );die;
                            }
                        }
                        else
                        {
                            header( "Location:createAccount.php" );die;
                        }
                    }
                    else
                    {
                        header( "Location:createAccount.php" );die;
                    }
                }
                else
                {
                    header( "Location:createAccount.php" );die;
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
body {
	background-image: url("images/background.png");
	background-repeat: repeat;
	background-size: contain;
	background-attachment: fixed;
}
form.create {
	background-color:rgba(255, 255, 255, 0.3);
	border:2px solid gray;
}
input[type=text], [type=email],[type=password],[type=number],[type=date] {
  width: 20%;
  padding: 3px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
select{
    width: 20.75%;
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
canvas{
	width: 200px;
	height:200px;
    border:2px solid gray;
	border-radius: 50%;
	cursor: default;
    background-color:rgba(255, 255, 255, 0.2);
}
canvas img {
	max-width: 100%;
}
div.lable{
    width:150px;
    display:inline-block;
    text-align:left;
}
</style>
	<title>Create An Account</title>
	<link rel="stylesheet" href="css/main.css">
    
</head>
<body>
<center>
	<article>
    <h2>Create An Account</h2>
		<center>
	<form action="createAccount.php" method="post" onSubmit="return check2()" enctype="multipart/form-data" class="create">
        <p id="alert1" style="display:none;color:red;"></p>
		<div class="lable"><b>Student Number</b></div><input type="text" name="stuNumber" id="stuNumber"><br>
        <p id="alert2" style="display:none;color:red;"></p>
		<div class="lable"><b>Index Number</b></div><input type="number" name="indNumber" id="indNumber"><br>
        <p id="alert3" style="display:none;color:red;"></p>
		<div class="lable"><b>First Name</b></div><input type="text" name="firstName" id="firstName"><br>
        <p id="alert4" style="display:none;color:red;"></p>
		<div class="lable"><b>Last Name</b></div><input type="text" name="lastName" id="lastName"><br>
        <div class="lable"><b>Birthday</b></div><input type="date" name="birthday" id="birthday"><br>
        <p id="alert5" style="display:none;color:red;"></p>
        <div class="lable"><b>Gender</b></div>
        <select name="gender" id="genders">
            <option value="" selected>Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>
		<div class="lable"><b>E-mail</b></div><input type="email" name="email" id="email"><br>
		<div class="lable"><b>Phone Number</b></div><input type="number" name="phoNumber" id="phoNumber"><br>
        <p id="alert6" style="display:none;color:red;"></p>
		<div class="lable"><b>Password</b></div><input type="password" name="password1" id="password1"><br>
		<div class="lable"><b>Re-enter Password</b></div><input type="password" name="password2" id="password2"><br>
		<p><b>Upload a profile photo</b></p>
        <canvas id="canvas"></canvas>
		<input type="file" name="photoName" id="photoName"><br>
		<input type="submit" value=" Submit " name="submit">
	 </form>
	 </center>
	 </article>
     </center>
     <script>
     function validateEmail(email) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
    {
        return (true)
    }
        alert("You have entered an invalid email address!")
        return (false)
    }

    var userEmail = document.getElementById("email");

    function validateForm() {
        var isValidEmail = validateEmail(userEmail.value);
        return isValidEmail;
    }
    </script>
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>