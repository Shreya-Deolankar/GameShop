<?php

session_start();

error_reporting(E_ALL & ~E_NOTICE);

$emp_ssn = $_SESSION['varname'];

$_SESSION['varname'] = $emp_ssn;

$status = $_SESSION['status'];

if($status != NULL)
{
	ECHO $status;
}

?>

<!DOCTYPE html>
	<html>
	<head>
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

	<td style="height:100px">
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
	  <button class="tablinks" onclick="location.href='supply.php'">Supply Details</button>
	</div>

</body>
</html>
	<?php
		// Get a connection for the database
		require_once('../mysqli_connect.php');


		$ssn = $_SESSION['varname'];

		$query5 = "SELECT e.fname, e.lname,e.ph_num,e.salary,e.sex, e.bdate,e.street,e.city,e.state,e.zip, e.location,e.image,e.ssn
					FROM employee e";

		// Get a response from the database by sending the connection
		// and the query
		$response5 = @mysqli_query($dbc, $query5);

		if($response5){

		echo "<h2 align = 'center'>Employee Details</h2>";

			while($row5 = mysqli_fetch_array($response5)){

				echo '<table align="left"
				cellspacing="5" cellpadding="8">';

				echo '<tr><td align="left"><img src="data:image/jpeg;base64,'.base64_encode( $row5['image'] ).'" alt="HTML5 Icon" style="width:128px;height:128px" align = "center"></td>';

				echo '<tr><td align="left"></br><b>Employee Name: </b>'.$row5['fname'];
				echo '</br><b>Employee Last Name: </b>'.$row5['lname'];
				echo '</br><b>Phone Number: </b>'.$row5['ph_num'];
				echo '</br><b>SSN: </b>'.$row5['ssn'];
				echo '</br><b>Salary: </b>'.$row5['salary'];
				echo '</br><b>Sex: </b>'.$row5['sex'];
				echo '</br><b>Date of Birth: </b>'.$row5['bdate'];
				echo '</br><b>Street: </b>'.$row5['street'];
				echo '</br><b>State: </b>'.$row5['state'];
				echo '</br><b>City: </b>'.$row5['city'];
				echo '</br><b>Zip: </b>'.$row5['zip'];
				echo '</br><b>Location: </b>'.$row5['location'].'</td></tr>' ;

					
			}
		} 
		else {

		echo "Couldn't issue database query<br />";

		echo mysqli_error($dbc);

		}
	mysqli_close($dbc);
?>

<html>

<table align="top"
		cellspacing="3" cellpadding="3">
		<tr><td align="left" height="10"><br><form align="center" action="AddCust.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "AddCust" value = "Add Customer" style="font-size : 14px;height:35px;width:105px"/> </br>

	    </form></br></td>
	    <td align="left" height="10"><br><form align="center" action="EditCust.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "EditCust" value = "Edit Customer" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></br></td>

	    <td align="left" height="10"><br><form align="center" action="AddInv.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "AddInv" value = "Add Movie" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></br></td>

	    <td align="left" height="10"><br><form align="center" action="EditInv.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "EditInv" value = "Edit Movie" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></br></td>

	    <td align="left" height="10"><br><form align="center" action="AddGame.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "AddGame" value = "Add Game" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></br></td>

	    <td align="left" height="10"><br><form align="center" action="EditGame.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "EditGame" value = "Edit Game" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></br></td>

	    <td align="left" height="10"><br><form align="center" action="AddSupp.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "AddSupp" value = "Add Supplier" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></br></td>

	    <td align="left" height="10"><br><form align="center" action="EditSupp.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "EditSupp" value = "Edit Supplier" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></br></td>

	     <td align="left" height="10"><br><form align="center" action="AddDep.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "AddDep" value = "Add Dependent" style="font-size : 14px;height:35px;width:115px"/></br>

	    </form></br></td>

	    <td align="left" height="10"><br><form align="center" action="EditDep.php" method="get">
		
		
		<br><input type = "SUBMIT" name = "EditDep" value = "Edit Dependent" style="font-size : 14px;height:35px;width:115px"/></br>

	    </form></br></td></tr>

	    <tr><td align="left" height="10"><form align="center" action="AddEmp.php" method="get">
		
		
		<input type = "SUBMIT" name = "AddEmp" value = "Add Employee" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></td>

	     <td align="left" height="10"><form align="center" action="EditEmp.php" method="get">
		
		
		<input type = "SUBMIT" name = "EditEmp" value = "Edit Employee" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></td>

	    <td align="left"><form align="center" action="AddPur.php" method="get">
		
		
		<input type = "SUBMIT" name = "AddPur" value = "Add Purchase" style="font-size : 14px;height:35px;width:115px"/></br>

	    </form></td>

	    <td align="left"><form align="center" action="AddRent.php" method="get">
		
		
		<input type = "SUBMIT" name = "AddRent" value = "Add Rent" style="font-size : 14px;height:35px;width:105px"/></br>

	    </form></td></tr>

	 </table>
</html>