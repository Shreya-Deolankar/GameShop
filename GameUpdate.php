<?php
	
	//database connection
	$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");

	// Get a connection for the database
	//require_once('../mysqli_connect.php');
	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}

	$product_id = $_POST['product_id'];
	$product_name = ucfirst(strtolower($_POST['product_name']));
	$location = ucfirst(strtolower($_POST['location']));
	$num_of_copies = ucfirst(strtolower($_POST['num_of_copies']));
	$year = ucfirst(strtolower($_POST['year']));
	$publisher = ucfirst(strtolower($_POST['publisher']));
	$platform = ucfirst(strtolower($_POST['platform']));
	//$award_name = ucfirst(strtolower($_POST['award_name']));
	//$category_name = ucfirst(strtolower($_POST['category_name']));

	$result = $mysqli->query("UPDATE product SET product_name = '$product_name',year = '$year'
		  WHERE product_id = '$product_id'");

	$result1 = $mysqli->query("UPDATE inventory SET location = '$location',num_of_copies = '$num_of_copies'
		  WHERE product_id = '$product_id'
		  AND location = '$location'");

	$result2 = $mysqli->query("UPDATE game SET publisher = '$publisher',developer = '$publisher',platform = '$platform'
		  WHERE product_id = '$product_id'");


	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}
	
	if($result){
		if($result1){
			if($result2){
				session_start();

				$output = "Data Updated Successfully!!";
				echo $output;

				$_SESSION['status'] = $output;
				header( 'Location: tab1.php' );
			}
		}
	}
	?>

