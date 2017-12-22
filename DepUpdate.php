<?php

	//database connection
	$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");

	// Get a connection for the database
	//require_once('../mysqli_connect.php');
	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}

	$essn = $_POST['essn'];
	$dep_name = ucfirst(strtolower($_POST['dep_name']));
	$relation = ucfirst(strtolower($_POST['relation']));
	$dob = $_POST['dob'];
	$output = NULL;

	$resultSet = $mysqli->query("UPDATE dependent SET dep_name = '$dep_name',relation = '$relation',$dob = '$dob'
		  WHERE essn = '$essn'
		  AND dep_name = '$dep_name' ");

	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}
	else{
		if($resultSet){
		
		session_start();

				$output = "Data Updated Successfully!!";
				echo $output;

				$_SESSION['status'] = $output;
				header( 'Location: tab1.php' );	

		}
		else{
		$output = "No results";
		echo $output;
		}
		
	}
	?>