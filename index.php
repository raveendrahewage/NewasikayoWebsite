<?php include_once('includes/connection.php'); ?>
<?php require('includes/header1.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Hostel</title>
	<link rel="stylesheet" href="css/main.css">
	<style>
h1 {
	color:black;
 	text-align: center;
}
body {
	background-image: url("images/background.png");
	background-repeat: repeat;
	background-size: contain;
	background-attachment: fixed;
}
nav {
	background-color:rgba(255, 255, 255, 0.3);
}
div.home {
		background-color: rgba(255,255,255,0.4);
		border:2px solid gray;
}
img.fit{
	width:98.25%;
	max-height:auto;
}
</style>
</head>
<body>
<center>
		<article>
        <h2 style="text-align:left;">Home</h2>
			<div class="home">
				<div class="quote">
				<center>
				<div class="slideshow cycle-slideshow" style="z-index:-1;">
				    <img src="images/set1.jpg" class="fit" style="border:2px solid gray">
                    <img src="images/set2.jpg" class="fit" style="border:2px solid gray">
                    <img src="images/set3.jpg" class="fit" style="border:2px solid gray">
                </div>
				<pre ><p style="font-size: 20px;font-family: Comic Sans MS;">Hostel days are memorable days for me
We were in hostel for one year.
“We make the rules and we only break the rules ”
Hostel life made us better people and better human beings
Life with no complaints but full compromises .
No expectations from anyone .
Understand the value of money.
Friends are like family
Creepy Roommates .
It brings two different kinds of people together in short time which lives forever.
It shows the reality of life.
Hostel life shows us how to choose friends and how to behave.
Understand the value of food.
Sharing is all about caring .
It's all about experiences
The only thing, that We miss in hostel that is foods of our mothers .
We have no regrets in our hostel life.
Best days of my life
We really don't miss them because that memories are close to our heart .</p>
			</center>
			</div>
			</div>
		</article>
        </center>
</body>
</html>
<?php mysqli_close($connection); ?>
<?php include_once('includes/footer.php'); ?>