<?php

	//database connection
	$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");

	// Get a connection for the database
	//require_once('../mysqli_connect.php');
	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}

	$supplier_name = ucfirst(strtolower($_POST['supplier_name']));
	$phnum = ucfirst(strtolower($_POST['phnum']));
	$street = ucfirst(strtolower($_POST['street']));
	$city = ucfirst(strtolower($_POST['city']));
	$state = ucfirst(strtolower($_POST['state']));
	$zip = $_POST['zip'];
	$supplier_id = $_POST['supplier_id'];

	$result = $mysqli->query("UPDATE supplier SET supplier_name = '$supplier_name',ph_num = '$phnum',street = '$street',city = '$city',state = '$state',zip='$zip' 
		  WHERE supplier_id = '$supplier_id'");


	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}
	else{
		if($result)
		{
					session_start();

					$output = "Data Updated Successfully!!";
					echo $output;

					$_SESSION['status'] = $output;
					header( 'Location: tab1.php');
		}
	}
	
	//$mysqli_close();

	?>