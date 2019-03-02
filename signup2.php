<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "quiz-login";
	$conn = mysqli_connect($servername, $username, $password, $dbname);


	$first=$_POST['fname'];
	$last=$_POST['lname'];
	$email=$_POST['email1'];
	$uid=$_POST['uid1'];
	$pwd=$_POST['pwd1'];

	if ($conn->connect_error) {
	    echo "die";
	}else{
		if(isset($_POST['fname'])){
		if(empty($first)||empty($last)){
			echo 'please fill the names';
		}else{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				echo 'email id is invalid';
			}else{
				if(!preg_match('/^(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{5,15}$/', $pwd)){
					echo "Please enter valid characters in pwd";
				}else{
					$_SESSION['first']=$first;
					$_SESSION['last']=$last;
					$_SESSION['email']=$email;
					$_SESSION['uid']=$uid;
					$_SESSION['pwd']=$pwd;
					$hashed_pwd=md5($pwd);
					$sql="INSERT INTO Persons (firstname, lastname, email, uid, pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashed_pwd')";
					if(mysqli_query($conn, $sql)){
				    echo 'success';
					} else{
					  echo 'failed to run query';
					}

				}
			}
		}
	}
}
?>