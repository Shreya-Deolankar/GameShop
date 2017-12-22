<?php	
	// Get a connection for the database
	require_once('../mysqli_connect.php');
	
	session_start();

	$emp_fname = ucfirst(strtolower($_POST['fname']));
	$emp_lname = ucfirst(strtolower($_POST['lname']));
	$ssn = $_POST['ssn'];

	$query = "SELECT fname,lname,ssn
					FROM EMPLOYEE
					WHERE fname = '$emp_fname'
					AND lname = '$emp_lname'
					AND ssn = '$ssn'";

	$response = @mysqli_query($dbc, $query);

	if(mysqli_num_rows($response)>0){
		// mysqli_fetch_array will return a row of data from the query
		// until no further data is available
		while($row = mysqli_fetch_array($response)){

		echo "Validation Successful";

		$_SESSION['varname'] = $row['ssn'];
		$_SESSION['status'] = NULL;
		header( 'Location: tab1.php' );

	   }

	}
	else{
		echo "Validation Unsuccessful";
	}

	?>

<!--<!DOCTYPE html>
<html>
<head>
	<style>
		body {
    			background-color: #DAF7A6 		
             }
        
	</style>
	    <img src="cd.jpg" alt="HTML5 Icon" style="width:1270px;height:200px;">
		<title>GM Shop Movies and Games</title>
</head>
<body>
<h1>GM Shop Movies and Games Rental/Purchase</h1>
</body>
</html>-->
