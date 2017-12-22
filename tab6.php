<?php

session_start();

$emp_ssn = $_SESSION['varname'];

$_SESSION['varname'] = $emp_ssn;
$_SESSION['status'] = NULL;

?>

<!DOCTYPE html>
	<html>
	<head>
	<style>
		body {
    			background-color: #A8C631		
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
	  <button class="tablinks" onclick="location.href='supply.php'">Supply Details</button>
	</div>

</body>
</html>
	<?php
		// Get a connection for the database
		require_once('../mysqli_connect.php');


		$ssn = $_SESSION['varname'];

		$query5 = "SELECT e.ssn,e.fname, e.lname,d.dep_name, d.relation, d.dob
					FROM employee e, dependent d
					WHERE e.ssn = d.essn
					AND e.ssn = '$ssn'";

		// Get a response from the database by sending the connection
		// and the query
		$response5 = @mysqli_query($dbc, $query5);

		if($response5){
		

		echo '<table align="center"
		cellspacing="5" cellpadding="8" bgcolor="#DAF7A6">

        </br><tr><th align = "left"></th>
        <th align="right"><font size="+2">Dependent</font></th>
        <th align="left"><b><font size="+2">Details</font></th>
        <th align="left"></th>
        <th align="left"></th></tr>
		<tr><th align="left"><b>Employee Name</th>
		<th align="left"><b>Dependent Name</th>
		<th align="left"><b>Relation</th>
		<th align="left"><b>Date of Birth</th></tr>';

		// mysqli_fetch_array will return a row of data from the query
		// until no further data is available
		while($row5 = mysqli_fetch_array($response5)){


		echo '<tr><td align="left"><a href="EditDep.php?var=' . $row5['ssn'] .  '&val='. $row5['dep_name'] .' "/>' . 
		$row5['fname'] . ' ' . $row5['lname'] . '</td><td align="left">' .
		$row5['dep_name'] . '</td><td align="left">' .
		$row5['relation'] . '</td><td align="left">' .
		$row5['dob'] . '</td><td align="left">';

		
		}

		echo '</tr>';

		echo '</table>';

		} 
		else {

		echo "Couldn't issue database query<br />";

		echo mysqli_error($dbc);

		}
	mysqli_close($dbc);
?>

<!DOCTYPE html>
<html>
<body>

	<table align="top"
		cellspacing="1" cellpadding="2">
		</br><tr><td align="left"><form align="center" action="home.php" method="get">
		
		<input type = "SUBMIT" name = "home" value = "Home" style="font-size : 14px;height:35px;width:115px"/> 

	    </form></td>

		<td align="left"><form align="center" action="AddCust.php" method="get">
		
		
		<input type = "SUBMIT" name = "AddCust" value = "Add Customer" style="font-size : 14px;height:35px;width:105px"/> 

	    </form></td>
	    <td align="left"><form align="center" action="EditCust.php" method="get">
		
		
		<input type = "SUBMIT" name = "EditCust" value = "Edit Customer" style="font-size : 14px;height:35px;width:105px"/>

	    </form></td>

	    <td align="left"><form align="center" action="AddInv.php" method="get">
		
		
		<input type = "SUBMIT" name = "AddInv" value = "Add Movie" style="font-size : 14px;height:35px;width:105px"/>

	    </form></td>

	    <td align="left"><form align="center" action="EditInv.php" method="get">
		
		
		<input type = "SUBMIT" name = "EditInv" value = "Edit Movie" style="font-size : 14px;height:35px;width:105px"/>

	    </form></td>

	    <td align="left"><form align="center" action="AddGame.php" method="get">
		
		
		<input type = "SUBMIT" name = "AddGame" value = "Add Game" style="font-size : 14px;height:35px;width:105px"/>

	    </form></td>

	    <td align="left"><form align="center" action="EditGame.php" method="get">
		
		
		<input type = "SUBMIT" name = "EditGame" value = "Edit Game" style="font-size : 14px;height:35px;width:105px"/>

	    </form></td>

	    <td align="left"><form align="center" action="AddSupp.php" method="get">
		
		
		<input type = "SUBMIT" name = "AddSupp" value = "Add Supplier" style="font-size : 14px;height:35px;width:105px"/>

	    </form></td>

	    <td align="left"><form align="center" action="EditSupp.php" method="get">
		
		
		<input type = "SUBMIT" name = "EditSupp" value = "Edit Supplier" style="font-size : 14px;height:35px;width:105px"/>

	    </form></td>

	    <td align="left"><form align="center" action="AddDep.php" method="get">
		
		
		<input type = "SUBMIT" name = "AddDep" value = "Add Dependent" style="font-size : 14px;height:35px;width:115px"/>

	    </form></td>

	    <td align="left"><form align="center" action="EditDep.php" method="get">
		
		
		<input type = "SUBMIT" name = "EditDep" value = "Edit Dependent" style="font-size : 14px;height:35px;width:115px"/>

	    </form></td></tr>

	    <tr><td align="left"><form align="center" action="AddPur.php" method="get">
		
		
		<input type = "SUBMIT" name = "AddPur" value = "Add Purchase" style="font-size : 14px;height:35px;width:115px"/>

	    </form></td>

	    <td align="left"><form align="center" action="AddRent.php" method="get">
		
		
		<input type = "SUBMIT" name = "AddRent" value = "Add Rent" style="font-size : 14px;height:35px;width:105px"/>

	    </form></td></tr>
	    </table>

</body>
</html>