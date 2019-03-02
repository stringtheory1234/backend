<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz-login";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$id=$_POST['id'];
$qid=$_POST['qid'];
$ans=$_POST['ans'];
$uname=$_POST['uname'];
	$sql="SELECT * FROM correct_ans WHERE qid='$qid' AND correct='1' AND uid='$id'";
	$result1=mysqli_query($conn, $sql);
	if(mysqli_num_rows($result1)>0)
		echo 'cannot submit again';
	else{
		$sql="SELECT * FROM answer WHERE qid='$qid' AND qans='$ans'";
		$result=mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0){
			
		$sql2="INSERT INTO correct_ans (uid, qid, correct, uname) VALUES('$id', '$qid', '1', '$uname')";
		mysqli_query($conn, $sql2);
		echo "you got 100 points !! Correct ans!!";
		}else{
			echo "Try Again!!";
		}
	}

	


?>