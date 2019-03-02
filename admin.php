<?php

session_start();

$_SESSION['msg']='';

?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<style type="text/css">
	html, body{
		box-sizing: border-box;
	}
		#add_ques{
			line-height: 5rem;
			font-size: 3rem;
			color: blue;
			width: 100%;
			text-align: center;
		}
		#add_ques:hover{
			color: green;
			cursor: pointer;
		}
		#ques, #ans{
			font-size: 1rem;
			width: 20%;
			padding: 3%;
			height: 10%;
			margin-left: 20%;
			margin-top: 10%;


		}
		#btn{
			font-size: 3rem;
			margin-left: 45%;
			margin-top: 15%;

		}
		#btn:hover{
			color: #00f;
			cursor: pointer;
		}
	</style>
	<script language="JavaScript" type="text/javascript" src="jquery-3.3.1.min.js"></script>
	
</head>
<body>
	<button id="add_ques">Add Question</button>
	<input type="text" name="ques" placeholder="enter question" id="ques">
	<input type="text" name="ans" placeholder="enter answer" id="ans">
	<button id="btn" onclick="func()">Submit</button>
</body>
	<script type="text/javascript">
		function func(){
			var q= document.getElementById('ques').value;
			var a=document.getElementById('ans').value;
			if(q!=null && a!=null)
				window.location.href = "admin2.php?ques=" + q + "&ans=" + a;
		}
	</script>
</html>