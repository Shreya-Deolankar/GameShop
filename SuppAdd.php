<?php

	//database connection
	$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");

	// Get a connection for the database
	//require_once('../mysqli_connect.php');
	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}

	$supp_name = ucfirst(strtolower($_POST['sname']));
	$phnum = ucfirst(strtolower($_POST['phnum']));
	$street = ucfirst(strtolower($_POST['street']));
	$city = ucfirst(strtolower($_POST['city']));
	$state = ucfirst(strtolower($_POST['state']));
	$zip = $_POST['zip'];

	$result = $mysqli->query("INSERT INTO supplier(supplier_name,ph_num,street,city,state,zip)
					VALUES('$supp_name','$phnum','$street','$city','$state','$zip')");


	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}
	
	if($result)
	{
		session_start();

					$output = "Data Inserted Successfully!!";
					echo $output;

					$_SESSION['status'] = $output;
					header( 'Location: tab1.php');
	}
							
			

	?>
