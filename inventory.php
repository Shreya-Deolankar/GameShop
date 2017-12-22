<?php

	//database connection
	$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");

	// Get a connection for the database
	//require_once('../mysqli_connect.php');
	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}

	$product_name = ucfirst(strtolower($_POST['product_name']));
	$location = ucfirst(strtolower($_POST['location']));
	$num_of_copies = intval($_POST['num_of_copies']);
	$year = $_POST['year'];
	$director = ucfirst(strtolower($_POST['director']));
	$actor = ucfirst(strtolower($_POST['actor']));
	$actress = ucfirst(strtolower($_POST['actress']));
	$award = ucfirst(strtolower($_POST['award']));
	$category = ucfirst(strtolower($_POST['category']));

	$mysqli->query("INSERT INTO product(product_name,product_type,year,rating_count,rating)
					VALUES('$product_name','Movie','$year','0','0')");

	$resultSet = $mysqli->query("SELECT product_id 
					FROM   product
					WHERE product_name LIKE '%$product_name%'");


	if($resultSet->num_rows>0){
			while($row = $resultSet->fetch_assoc())
			{
				$product_id = $row['product_id'];

				
				$result = $result1 = $mysqli->query("INSERT INTO inventory(location,product_id,num_of_copies)
								VALUES('$location','$product_id','$num_of_copies')");

				$result1 = $mysqli->query("INSERT INTO movie(director,product_id)
								VALUES('$director','$product_id')");

				$result4 = $mysqli->query("INSERT INTO supply(location,product_id,supplier_id)
								VALUES('$location','$product_id','5')");

				if($award != NULL)
				{

					$result2 = $mysqli->query("INSERT INTO award(product_id,award_name)
									VALUES('$product_id','$award')");
				}

				if($category !=  NULL)
				{


					$result3 = $mysqli->query("INSERT INTO category(product_id,category_name)
									VALUES('$product_id','$category')");
				}
				if($actor !=  NULL)
				{

				$result4 = $mysqli->query("INSERT INTO actor(actor_name,product_id)
										VALUES('$actor','$product_id')");
				}
				if($actress !=  NULL)
				{

				$result5 = $mysqli->query("INSERT INTO actor(actor_name,product_id)
										VALUES('$actress','$product_id')");
				}
			}
				
		}
		else{
		$output = "No results";
		echo $output;
		}


	if(!$mysqli){
		die('Could not connect to database:' .mysql_error());
	}
	
	if($result4){
		if($result5){
				session_start();

				$output = "Data Inserted Successfully!!";
				echo $output;

				$_SESSION['status'] = $output;
				header( 'Location: tab1.php');
		}
	}

?>