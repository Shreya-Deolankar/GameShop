h<?php

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

	?>

<!DOCTYPE html>
	<html>
	<head>
	<style>
		body {
    			background-color: #DAF7A6		
             }

        <style>
		body {
    			background-color: #DAF7A6		
             }


        div.tab {
	    overflow: hidden;
	    border: 1px solid #ccc;
	    background-color: #f1f1f1;
	}

	/* Style the buttons inside the tab */
	div.tab button {
	    background-color: inherit;
	    float: left;
	    border: none;
	    outline: none;
	    cursor: pointer;
	    padding: 14px 16px;
	    transition: 0.3s;
	}

	/* Change background color of buttons on hover */
	div.tab button:hover {
	    background-color: #ddd;
	}

	/* Create an active/current tablink class */
	div.tab button.active {
	    background-color: #ccc;
	}

	/* Style the tab content */
	.tabcontent {
	    display: none;
	    padding: 6px 12px;
	    border: 1px solid #ccc;
	    border-top: none;
	}
	</style>
	<title>GM Shop Movie and Game Portal</title>
	</head>
	<body align = "left">

	<div class="tab">
	  <button class="tablinks" onclick="location.href='tab1.php'">List Of Customers</button>
	  <button class="tablinks" onclick="location.href='tab2.php'">Inventory List</button>
	  <button class="tablinks" onclick="location.href='tab3.php'">Supplier Details</button>
	  <button class="tablinks" onclick="location.href='tab4.php'">Rental Details</button>
	  <button class="tablinks" onclick="location.href='tab5.php'">Purchase Details</button>
	  <button class="tablinks" onclick="location.href='tab6.php'">Dependent Details</button>
	</div>

		<table align="top"
		cellspacing="5" cellpadding="8">
		<tr><td align="left"><br><form align="center" action="AddCust.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "AddCust" value = "Add Customer" style="font-size : 14px;height:35px;width:105px"/> </br>

	    </form></br></td>
	    <td align="left"><br><form align="center" action="EditCust.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "EditCust" value = "Edit Customer" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></br></td>

	    <td align="left"><br><form align="center" action="AddInv.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "AddInv" value = "Add Movie" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></br></td>

	    <td align="left"><br><form align="center" action="EditInv.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "EditInv" value = "Edit Movie" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></br></td>

	    <td align="left"><br><form align="center" action="AddGame.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "AddGame" value = "Add Game" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></br></td>

	    <td align="left"><br><form align="center" action="EditGame.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "EditGame" value = "Edit Game" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></br></td>

	    <td align="left"><br><form align="center" action="AddSupp.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "AddSupp" value = "Add Supplier" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></br></td>

	    <td align="left"><br><form align="center" action="EditSupp.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "EditSupp" value = "Edit Supplier" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></br></td></tr>

</body>
</html>