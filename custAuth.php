
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body {
    	background-color: #DAF7A6 		
             }
        .container {
        width: 500px;
        clear: both;
    			}
    .container input {
        width: 100%;
        clear: both;
    		}
	</style>
	    <img src="cd.jpg" alt="HTML5 Icon" style="width:1270px;height:200px;">
		<title>GM Shop Movie and Game</title>
	</head>
<body>
<h1 align = "center"> GM Shop Movies and Games Rental/Purchase</h1>
<h2>Please Sign In</h2>
<div class="container">
	<form action="custValidation.php" method="post">
	<p>First Name  : <input align="right" type="text" name="fname"></p>
	<p>Last Name   : <input align="right" type="text" name="lname"></p>
	<p>Phone Number: <input align="right" type="password" name="phnum"></p>
	<input type="submit" value="Sign In">
	</form>

	<p>Don't have an account? <a href="custRegister.php">Sign-Up</a></p>
	
</div>
</body>
</html>