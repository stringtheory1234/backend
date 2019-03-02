<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz-login";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (isset($_GET['action'])) {
	if ($_GET['action'] === "getQues") {
			$query ="SELECT * FROM answer";
			$result=mysqli_query($conn, $query);
			$ques='';
			while ($row=mysqli_fetch_assoc($result)) {
				$ques.='<div class="question">
		<p>'.$row['question'].'</p>
		<input type="text" name="text" id="v'.$row['qid'].'">
		<button type="submit" name="submit1" onclick="myfunc('.$row['qid'].')" id="1">submit</button>
	</div>';
			}
			echo $ques;	
			die();
	}
}
?>