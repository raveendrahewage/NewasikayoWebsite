<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/main.css"> 
	<style>
		h2	{
			background: black;
			border-radius:20px;
			padding: 2px 2px 2px 10px;
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
        a:link[id="hd"] {
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
nav.header {
	width:97%;
	height: auto;
	float: center;
}
div[class=option]:hover{
	background: white;
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
	</style>
</head>
<body>
	<header>
        <div class="topnav">
            <ul class="a">
                <h1 style="font-weight: bold;color:white;">නේවාසිකයෝ</h1><hr>
                <li class="b"><a href="logIn.php" class="c"><b>Log In</b></a></li>
                <li class="b"><a href="index.php" class="c"><b>Home</b></a></li>
                <li class="b"><a href="boysDisplay.php" class="c"><b>Boaders</b></a></li>
            </ul>
        </div>
	</header>
    