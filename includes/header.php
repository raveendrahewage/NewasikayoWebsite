<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/main.css"> 
	<style>
		h2	{
			background: black;
			border-radius:20px;
			padding: 2px 2px 2px 20px;
			color:white;
			font-family: Comic Sans MS;
			border:2px solid black;
		}
		ul.header {
			font-family: Comic Sans MS;
			padding: 10px 10px 10px 10px;
			display: inline-flex;
			width: 98.65%;
			background: black;
		}
		form {
			border:2px solid gray;
			background: white;
		}
        a:link[id="hd"]
        {
             color: white;
		     text-decoration: none;
        }
        a:visited[id="hd"] {
		  color: white;
		  text-decoration: none;
		}
        a:hover[id="hd"] {
		  color: gray;
		}

		a:active[id="hd"] {
		  color: gray;
		}
		a:link {
		  color: black;
		  text-decoration: none;
		}

		a:visited {
		  color: black;
		  text-decoration: none;
		}

		a:hover {
		  color: gray;
		}

		a:active {
		  color: gray;
		}

input[type=text], [type=email],[type=password] {
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
  padding: 3px 10px 3px 10px;
  border: 1px solid black;
  border-radius: 4px;
  cursor: pointer;
  float: center;
}
input[type=submit]:hover {
  background-color: gray;
}
input[class=search] {
  background-color: black;
  color: white;
  padding: 4px 20px;
  border: 1px solid black;
  border-radius: 4px;
  cursor: pointer;
  float: center;
}
input[class=search]:hover {
  background-color: gray;
}
input[class=bar] {
  width: 40%;
  padding: 3px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

div[class=option]:hover{
	background: white;
}
@media screen and (min-width: 601px) {
div.go {
	color:white;
}
}
div.topnav {
    width:100%;
    float:center;
    margin:0;
}
ul.a {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  font-family: Comic Sans MS;
  background-color: black;
  border-radius:20px;
}

li.b {
  float: left;
}

a.c {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  float:left;
  text-decoration: none;
}

a.c:hover {
  background-color: gray;
}
.d.f.g{
    width:100%;
    display:block;
}
.d.f.g.j{
    width:100%;
}
@media screen and (max-width:100px){
    div.topnav{
        width:100%;
    }
}
	</style>
</head>
<body>
	<header>
        <div class="topnav">
            <ul class="a">
            <h1 style="font-weight: bold;color:white;">නේවාසිකයෝ</h1>
            <hr>
            <li class="b"><a href="logIn.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" class="c"><b>Log Out</b></a></li>
            <li class="b"><a href="home.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" class="c"><b>Home</b></a></li>
            <li class="b"><a href="profileInfo.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" class="c"><b>Profile</b></a></li>
            <li class="b"><a href="boys.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" class="c"><b>Boaders</b></a></li>
            <li class="b"><a href="memories.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" class="c"><b>Memories</b></a></li>
            <li class="b"><a href="displayPosts.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" class="c"><b>Posts</b></a></li>
            <li class="b"><a href="createPost.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" class="c"><b>New Post</b></a></li>
            </ul>
        </div>
        <!--<div class="d">
                <h3>Menu</h3>
                <ul class="f">
                <li class="g"><a href="logIn.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" class="j"><b>Log Out</b></a></li>
                <li class="g"><a href="home.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" class="j"><b>Home</b></a></li>
                <li class="g"><a href="profileInfo.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" class="j"><b>Profile</b></a></li>
                <li class="g"><a href="boys.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" class="c"><b>Boaders</b></a></li>
                <li class="g"><a href="memories.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" class="j"><b>Memories</b></a></li>
                <li class="g"><a href="displayPosts.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" class="j"><b>Posts</b></a></li>
                <li class="g"><a href="createPost.php?stuNumber=<?php echo $_GET['stuNumber']; ?>" class="j"><b>New Post</b></a></li>
                </ul>
            </div>-->
	</header>
    