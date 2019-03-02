<?php

	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "quiz-login";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$ques=$_GET['ques'];
	$ans=$_GET['ans'];
	if($ques){
		$sql="INSERT INTO answer (question, qans) VALUES('$ques', '$ans')";
		mysqli_query($conn, $sql);
		echo "hello";
	}else{
		echo "fail";
	}






?>