<?php

	//database connection
	$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");

	// Get a connection for the database
	//require_once('../mysqli_connect.php');
	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}

	$cust_fname = ucfirst(strtolower($_POST['fname']));
	$cust_lname = ucfirst(strtolower($_POST['lname']));
	$phnum = ucfirst(strtolower($_POST['phnum']));
	$street = ucfirst(strtolower($_POST['street']));
	$city = ucfirst(strtolower($_POST['city']));
	$state = ucfirst(strtolower($_POST['state']));
	$zip = $_POST['zip'];
	$cust_id = $_POST['cust_id'];

	$result = $mysqli->query("UPDATE customer SET cust_fname = '$cust_fname',cust_lname = '$cust_lname',ph_num = '$phnum',street = '$street',city = '$city',state = '$state',zip='$zip' 
		  WHERE cust_id = '$cust_id'");


	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}
	

	if($result){
				session_start();

				$output = "Data Updated Successfully!!";
				echo $output;

				$_SESSION['status'] = $output;
				header( 'Location: tab1.php' );
			
	}
	else{
		$output = "Update Unsuccessful";
		echo $output;
	}

	//$mysqli_close();

	?>