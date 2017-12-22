<?php

	//database connection
	$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");

	// Get a connection for the database
	//require_once('../mysqli_connect.php');
	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}


	session_start();

	$emp_ssn = $_SESSION['varname'];

	$_SESSION['varname'] = $emp_ssn;

	$dep_name = ucfirst(strtolower($_POST['dep_name']));
	$relation = ucfirst(strtolower($_POST['relation']));
	$dob = $_POST['dob'];


	$resultSet = $mysqli->query("INSERT INTO dependent(essn,dep_name,relation,dob)
					VALUES('$emp_ssn','$dep_name','$relation','$dob')");

	if($resultSet){
	
				session_start();

				$output = "Data Inserted Successfully!!";
				echo $output;

				$_SESSION['status'] = $output;
				header( 'Location: tab1.php' );		
	}
	else{
		$output = "No results";
		echo $output;
	}

	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}
	
	//echo "Data Inserted Successfully!!"
	//$mysqli_close();

?>