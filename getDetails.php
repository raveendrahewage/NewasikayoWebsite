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
form.change {
	background-color:rgba(255, 255, 255, 0.3);
	border:2px solid gray;
	font-family: Comic Sans MS;
	font-size: 20px;
}
input[type=text], [type=email],[type=password],[type=number],[type=date] {
  width: 20%;
  padding: 3px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
select {
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
img.proPicture {
	border-radius: 50%;
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
    width:200px;
    display:inline-block;
    text-align:left;
}
</style>
	<title>Edit Details</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<center>
	<article>
    <h2><?php echo "Edit Details Of ".$_GET['name']; ?></h2>
		<?php 
		echo '<form action="profileInfo.php?stuNumber='.$_GET['stuNumber'].'" method="post" enctype="multipart/form-data" class="change" onsubmit="return valifateForm();">';
			if(!empty($_GET['photoName']))
			{
				echo '<img src="images/boaders/'.$_GET['photoName'].'" class="proPicture" width="200" height="200" alt="photo" style="border:2px solid gray;">';
			}
			else
			{
				echo '<img src="images/unknown.png" class="proPicture" height="200" title="Logo of a company" alt="photo" style="border:2px solid gray;">';
			} ?>
			<br>
		<!--<b>Student Number</b><br><input type="text" name="stuNumber" value="<?php echo $_GET['stuNumber']; ?>" id="stuNumber"><br>
		<b>Index Number</b><br><input type="text" name="indNumber" value="<?php echo $_GET['indNumber']; ?>" id="indNumber"><br>-->
		<div class="lable"><b>First Name</b></div><input type="text" name="firstName" value="<?php echo $_GET['firstName']; ?>" id="firstName" autofocus><br>
		<div class="lable"><b>Last Name</b></div><input type="text" name="lastName" value="<?php echo $_GET['lastName']; ?>" id="lastName"><br>
        <div class="lable"><b>Birthday</b></div><input type="date" name="birthday" value="<?php echo $_GET['birthday']; ?>" id="birthday"><br>
        <?php 
        echo '<div class="lable"><b>Gender</b></div>';
        echo '<select name="gender" id="genders">';
        if($_GET['gender']=="Male")
        {
            echo '<option value="Male" selected>Male</option>
                <option value="Female">Female</option>';
        }
        else if ($_GET['gender']=="Female")
        {
            echo '<option value="Female" selected>Female</option>
                <option value="Male">Male</option>';
        }
        else
        {
            echo '<option value="Male">Male</option>
                <option value="Female">Female</option>';
        }
            ?>
        </select><br>
		<div class="lable"><b>E-mail</b></div><input type="email" name="email" value="<?php echo $_GET['email']; ?>"id="email"><br>
		<div class="lable"><b>Phone Number</b></div><input type="number" name="phoNumber" value="<?php echo $_GET['phoNumber']; ?>"id="phoNumber" ><br>
		<p><b>Upload a new profile photo</b></p>
        <canvas id="canvas"></canvas>
		<input type="file" name="image" id="photoName"><br>
		<input type="submit" value=" Save " onclick="return confirm('Are you sure?')" name="submit">
	 </form>
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