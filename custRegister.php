
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
<h1>Please enter your details</h1>
<div class="container">
	<form action="custSave.php" method="post">
	<p>First Name  : <input align="right" type="text" name="fname"></p>
	<p>Last Name   : <input align="right" type="text" name="lname"></p>
	<p>Phone Number: <input align="right" type="text" name="phnum"></p>
	<p>Street      : <input align="right" type="text" name="street"></p>
	<p>City        : <input align="right" type="text" name="city"></p>
	<p>State       : <input align="right" type="text" name="state"></p>
	<p>Zip         : <input align="right" type="text" name="zip"></p>
	<input type="submit">
	</form>
</div>
</body>
</html>