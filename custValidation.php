<?php	
	// Get a connection for the database
	require_once('../mysqli_connect.php');

	session_start();
	

	$cust_fname = ucfirst(strtolower($_POST['fname']));
	$cust_lname = ucfirst(strtolower($_POST['lname']));
	$phnum = $_POST['phnum'];

	$query = "SELECT cust_id,cust_fname,cust_lname,ph_num
					FROM customer
					WHERE cust_fname = '$cust_fname'
					AND cust_lname = '$cust_lname'
					AND ph_num = '$phnum'";

	$response = @mysqli_query($dbc, $query);

	if(mysqli_num_rows($response)>0){
		// mysqli_fetch_array will return a row of data from the query
		// until no further data is available
		while($row = mysqli_fetch_array($response)){

		echo "Validation Successful";
		header( 'Location: search.php' );
		$_SESSION['varname'] = $row['cust_id'];

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
