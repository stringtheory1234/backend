<!DOCTYPE html>
<html>
<head>
	<title>signup-page</title>
</head>
<style type="text/css">
	body{
		margin: 0px;
		padding: 0px;
		height: 100%;
		width: 100%;
	}
	form{
		margin: 0 auto;
		width: 40%;
	}
	form input{
		line-height: 2rem;
		padding: 2%;
		margin-bottom: 2%;
		width: 100%;
		font-size: 1.5rem;
	}
	form button{
		height: 3rem;
		font-size: 1rem;
		margin-left: 50%;
	}
	#signup{
		text-align: center;
		font-size: 2.5rem;
		margin: 2%;
		padding: 2%;

	}
	button:hover{
		background-color: #ccc;
		cursor: pointer;
	}
	#error-msg{
		padding-left: 45%;
		font-size: 1.5rem;
		width: 100%;
		color: red;
	}
	
</style>
<script language="JavaScript" type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script>
      function myfunc(){
          var firstname = document.getElementById("firstname").value;
			var email = document.getElementById("email").value;
			var pwd = document.getElementById("pwd").value;
			var lastname = document.getElementById("lastname").value;
			var uid=document.getElementById("uid").value;
			var dataString = 'fname=' + firstname + '&email1=' + email + '&pwd1=' + pwd + '&lname=' + lastname+'&uid1='+uid;
			if (firstname == '' || email == '' || pwd == '' || lastname == ''||uid=='') {
				alert('fill empty slots');
			}
			else{
	          $.ajax({

	            type: 'POST',
	            url: 'signup2.php',
	            data: dataString,
	            cache: false,
	            success: function (abc) {
	              alert(abc);

	            }
	          });
      		}
      		return false;
        }

</script>
<body>
	<div id="signup">
		Sign up....
	</div>
	<form>
		<input type="text" placeholder="First Name" name="firstname" id="firstname" required>
		<input type="text" placeholder="Last Name" name="lastname" id="lastname" required>
		<input type="text" placeholder="email" name="email" id="email" required>
		<input type="text" placeholder="userid" name="uid" id="uid" required>
		<input type="password" placeholder="password" id="pwd" name="pwd" required>
		<button type="button" name="submit" id="submit" onclick="myfunc()">Submit</button>
	</form>
</body>
</html>