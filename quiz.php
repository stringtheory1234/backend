<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Questions</title>
	<style type="text/css">
		body{
			width: 100%;
		}
		a{
			text-decoration: none;
			color: black;
		}
		a:hover{
			color: blue;
		}
		.head{
			font-size: 3rem;
			text-align: center;
			color: blue;

		}
		.question{
			width: 90%;
			margin: 3%;
			float: left;
		}
		.question p{
			float: left;
			width: 40%;
			line-height: 2rem;
		}
		.question input{
			float: left;
			width: 10%;
			line-height: 1.5rem;
			margin-top: 3%;
			text-align: center;

		}
		.question button{
			float: right;
			width: 10%;
			margin-top: 3%;
			text-align: center;

		}
		.question button:hover{
			cursor: pointer;
			background-color: #ccc;

		}
		#qq{
			display: none;
		}
		#ans1, #ans2{
			width: 100%;
			font-size: 2rem;
		}
		#leader{
			font-size: 2rem;
			color: pink;
			background-color: black;
			width: 100%;
			text-align: center;
		}
		#lb{
			font-size: 3rem;
			text-align: center;
		}
	</style>
	
</head>
<body>
	<a href="logout.php" onclick="logout()">LOGOUT</a>
<!-- 	<div class="head">
		Questions to solve....
	</div>
	<div class="question">
		<p>Which is 5th triangular number</p>
		<input type="text" name="text" id="v1">
		<button type="submit" name="submit1" onclick="myfunc(1)" id="1">submit</button>
	</div>
	<div class="question">
		<p>how many pints in a gallon</p>
		<input type="text" name="text" id="v2">
		<button type="submit" name="submit2" onclick="myfunc(2)">submit</button>
	</div>
	<div class="question">
		<p>how many faces in a dodecagon</p>
		<input type="text" name="text" id="v3">
		<button type="submit" name="submit3" onclick="myfunc(3)">submit</button>
	</div>
	<div class="question">
		<p>which even number is a prime</p>
		<input type="text" name="text" id="v4">
		<button type="submit" name="submit4" onclick="myfunc(4)">submit</button>
	</div>
	<div class="question">
		<p>how many bits in a byte</p>
		<input type="text" name="text" id="v5">
		<button type="submit" name="submit5" onclick="myfunc(5)">submit</button>
	</div> -->
	<div id="qq">
	</div>
	<div id="append">
		
	</div>
	<div id="ans2">
		points: <p id="points"></p>
	</div>
	<div id="ans1"></div>
	<div id="lb">LeaderBoard...</div>
	<div id="leader"></div>


	<script language="JavaScript" type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<script>
			function myfunc(elem){
			var eml = "<?php echo $_SESSION['id'] ?>";
			var eml1 = "<?php echo $_SESSION['uid'] ?>";
			console.log(eml1);	      		
	      		console.log("v"+elem);
	          	var val = document.getElementById("v"+elem).value;
				var dataString = 'qid=' + elem + '&id=' + eml + '&ans=' + val+'&uname='+eml1;
				if (val=='') {
					alert('fill empty slots');
				}
				else{
		          $.ajax({

		            type: 'POST',
		            url: 'quiz-ans.php',
		            data: dataString,
		            cache: false,
		            success: function (abc) {
		              alert(abc);

		            }
		          });
	      		}
	      		$.post('get-points.php?action=getPoints', function(abc){
					$('#ans1').html(abc);
				});	
			}

			$( document ).ready(function() {
			  // Handler for .ready() called
				$.post('get-ques.php?action=getQues', function(response){	
						document.getElementById('append').innerHTML=response;
					});		
				$.post('get-points.php?action=getPoints', function(abc){
					$('#ans1').html(abc);
				});	  
				$.post('leaderboard.php?action=leader', function(res){
						$('#leader').html(res);
				});
			});

	      	
				
	        function logout(){
					$.ajax({
						type: 'POST',
						url: 'logout.php',
						success:function(abc){
							;
						}
					});
				}

	</script>
</body>
</html>