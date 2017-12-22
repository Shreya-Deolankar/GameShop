
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
<h1>Please Add Inventory Details</h1>
<div class="container">
	<form action="DepAdd.php" method="post">
	<p>Dependent Name  : <input align="right" type="text" name="dep_name"></p>
	<p>Relation      : <input align="right" type="text" name="relation"></p>
	<p>Date of Birth: <input align="right" type="text" name="dob"></p>
	<input type="submit">
	</form>
</div>
</body>
</html>

<?php

session_start();

$emp_ssn = $_SESSION['varname'];

$_SESSION['varname'] = $emp_ssn;

?>