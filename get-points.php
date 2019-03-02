<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz-login";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (isset($_GET['action'])) {
	if ($_GET['action'] === "getPoints") {
			$sql = "SELECT * from correct_ans where uid = '".$_SESSION['id']."'";
			$result=mysqli_query($conn, $sql);
			$sum=0;
			while ($row=mysqli_fetch_assoc($result)) {
				$sum+=$row['correct']*100;
			}
			echo $sum;	
	}
}
?>