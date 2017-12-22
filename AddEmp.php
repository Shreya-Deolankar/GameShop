
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
<h1>Please Add Employee Details</h1>
<div class="container">
	<form action="EmpAdd.php" method="post" enctype="multipart/form-data">
	<p>Employee First Name  : <input align="right" type="text" name="fname"></p>
	<p>Employee Second Name      : <input align="right" type="text" name="lname"></p>
	<p>SSN: <input align="right" type="text" name="ssn"></p>
	<p>Phone Number : <input align="right" type="text" name="ph_num"></p>
	<p>Salary: <input align="right" type="text" name="salary"></p>
	<p>Sex: <input align="right" type="text" name="sex"></p>
	<p>Date of Birth(yyy-mm-dd): <input align="right" type="text" name="bdate"></p>
	<p>Street: <input align="right" type="text" name="street"></p>
	<p>City: <input align="right" type="text" name="city"></p>
	<p>State: <input align="right" type="text" name="state"></p>
	<p>Zip: <input align="right" type="text" name="zip"></p>
	<p>Location: <input align="right" type="text" name="location"></p>
	 <label>File: </label><input type="file" name="image" />
	<input type="submit" value = "Upload" />
	</form>
</div>
</body>
</html>