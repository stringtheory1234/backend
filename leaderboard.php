<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz-login";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (isset($_GET['action'])) {
	if ($_GET['action'] === "leader") {
			$sql= "SELECT COUNT(correct), uname FROM correct_ans GROUP BY uname ORDER BY COUNT(correct) desc; ";
			$result=mysqli_query($conn, $sql);
			$rows=mysqli_fetch_all($result);
			$ans = "";
			foreach ($rows as &$row)  {
				$ans= $ans.$row[1]."  ::::::::: ".$row[0]."</br>";
			}
			echo $ans;	
	}
}
?>