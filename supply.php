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

		$query5 = "SELECT sup.supplier_name, p.product_name, s.supplied_on, s.num_of_copies,s.location FROM supply s,supplier sup, product p where s.supplier_id = sup.supplier_id and s.product_id = p.product_id ORDER BY sup.supplier_name DESC";

		// Get a response from the database by sending the connection
		// and the query
		$response5 = @mysqli_query($dbc, $query5);

		/*if($response5){
			while($row5 = mysqli_fetch_array($response5)){
				$supplier_id = $row5["supplier_name"];
				$supplier[$supplier_id][] = $row5;

			}

			foreach($supplier as $current_cat => $catgory_rows)
			{

				echo '<table align="left"
				cellspacing="5" cellpadding="8">';
				echo '<tr><td align="left"></br><b>Supplier Name: </b>'."{$current_cat}";
			   // echo '<tr><td align="left">' ."Category #{$current_cat}". '</td><td align="left">' ;
			   // echo '<table>';

			    foreach($catgory_rows as $row)
			    {
			        echo '<tr><td align="left">' . 'Product Name:'.$row['product_name'] . '</td></tr><td align="left">' . 
					'<tr><td align="left">' .'Supplied On:'.$row['supplied_on'] . '</td></tr><td align="left">' .
					'<tr><td align="left">' .'Quantity:'.$row['num_of_copies'] . '</td></tr><td align="left">' .
					'<tr><td align="left">' .'Location:'.$row['location'] . '</td></tr><td align="left">' ;
			    }
				echo '</table>';

			}

			//echo '</tr>';
			//echo '</table>';

		}*/

		if($response5){
		

		echo '<table align="center"
		cellspacing="5" cellpadding="8" bgcolor="#DAF7A6">

        </br><tr><th align = "left"></th>
        <th align="right"><b><font size="+2">Supply</font></th>
        <th align="left"><font size="+2">Details</font></th>
        <th align="left"></th></tr>
		<tr><th align="left"><b>Supplier</th>
		<th align="left"><b>Product</th>
		<th align="left"><b>Supplied On</th>
		<th align="left"><b>Quantity</th>
		<th align="left"><b>Location</th></tr>';

		// mysqli_fetch_array will return a row of data from the query
		// until no further data is available
		while($row5 = mysqli_fetch_array($response5)){


		echo '<tr><td align="left">' . 
		$row5['supplier_name'] . '</td><td align="left">' . 
		$row5['product_name'] . '</td><td align="left">' .
		$row5['supplied_on'] . '</td><td align="left">' .
		$row5['num_of_copies'] . '</td><td align="left">' .
		$row5['location'] . '</td><td align="left">';

		
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
