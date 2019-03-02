<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "quiz-login");
if(isset($_POST['submit'])){
	$email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $hashed_pwd = md5($pwd);
    $sql="SELECT * FROM Persons where email='$email' AND pwd='$hashed_pwd'";
	$result=mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);
	$val=mysqli_num_rows($result);
	if($val>0){
		$_SESSION['uid']=$row['uid'];
		$_SESSION['email']=$row['email'];
		$_SESSION['id']=$row['id'];
		if($_SESSION['uid']=='admin')
			header("Location: admin.php");
		else
			header("Location: quiz.php");
	}else{
		echo "fail";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		html, body{
			width: 100%;
			height: 100%;
			margin: 0px;
			padding: 0px;
			box-sizing: border-box;
			background-color: #FFFFF0	;
		}
		a{
			text-decoration: none;
			color: black;
		}
		a:hover{
			color: #00f;
		}
		#head{
			width: 100%;
			height: 10%;
			margin: 0px;
			padding: 0px;
			background-color: #F0FFFF	;
		}

		#head-div{
			width: 50%;
			float: right;
		}
		#home{
			float: left;
			width: 50%;
		}
		#home a{
			color: black;
			font-size: 2rem;
			text-decoration: none;
		}
		#head-div input, button, a{
			float: left;
			margin: 2%;
			line-height: 2rem;
		}
		#head-div a{
			font-size: 1.5rem;
		}
		button:hover{
			background-color: #ccc;
			cursor: pointer;
		}
		#home a:hover{
			color: #00d;
			cursor: pointer;
		}

		#body-div{
			text-align: center;
			font-size: 3em;
			color: black;
		}

	</style>
</head>
<body>
	<header id="head">
		<nav>
			<div id="home">
				<a href="login_page.php">Home</a>
			</div>
			<form id="head-div" action="login_page.php" method="POST">
				<input type="text" name="email" placeholder="email">
				<input type="password" name="pwd" placeholder="password">
				<button class="submit" id="submit" name="submit" onclick="func()">Log In</button>
				<a href="signup.php">Sign Up</a>
			</form>
		<nav>
	</header>
	<div id="body-div">Quizzardry</div>
</body>
</html>