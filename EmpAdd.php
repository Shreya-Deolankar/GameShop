<?php

	//database connection
	$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");

	// Get a connection for the database
	//require_once('../mysqli_connect.php');
	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}

	$fname = ucfirst(strtolower($_POST['fname']));
	$lname = ucfirst(strtolower($_POST['lname']));
	$ssn = ucfirst(strtolower($_POST['ssn']));
	$sex = ucfirst(strtolower($_POST['sex']));
	$salary = $_POST['salary'];
	$ph_num = $_POST['ph_num'];
	$bdate = $_POST['bdate'];
	$street = ucfirst(strtolower($_POST['street']));
	$city = ucfirst(strtolower($_POST['city']));
	$state = ucfirst(strtolower($_POST['state']));
	$zip = ucfirst(strtolower($_POST['zip']));
	$location = ucfirst(strtolower($_POST['location']));
	//$data1 = $_POST['image'];

    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

	$result = $mysqli->query("INSERT INTO employee(fname,lname,ssn,ph_num,salary,sex,bdate,street,city,state,zip,location,image)
					VALUES('$fname','$lname','$ssn','$ph_num','$salary','$sex','$bdate','$street','$city','$state','$zip','$location','$image')");


	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}
	
	if($result)
	{
		session_start();

					$output = "Data Inserted Successfully!!";
					echo $output;

					$_SESSION['status'] = $output;
					header( 'Location: owner.php');
	}

	?>
