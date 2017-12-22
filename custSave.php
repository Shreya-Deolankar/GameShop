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

	$resultSet = $mysqli->query("INSERT INTO customer(cust_fname,cust_lname,ph_num,street,city,state,zip)
					VALUES('$cust_fname','$cust_lname','$phnum','$street','$city','$state','$zip')");


	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}
	
	if($resultSet){

				$response = $mysqli->query("SELECT cust_id,cust_fname,cust_lname,ph_num
					FROM customer
					WHERE cust_fname = '$cust_fname'
					AND cust_lname = '$cust_lname'
					AND ph_num = '$phnum'");

				if(mysqli_num_rows($response)>0){
		
					while($row = mysqli_fetch_array($response)){

						session_start();

						$output = "Data Inserted Successfully!!";
						echo $output;

						$_SESSION['status'] = $output;
						$_SESSION['varname'] = $row['cust_id'];
						header( 'Location: search.php' );
					}
				}
		
		}
		else{
		$output = "No results";
		echo $output;
		}

	?>

