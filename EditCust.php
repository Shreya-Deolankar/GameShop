<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body {
    	background-color: #DAF7A6 		
             }
        .container {
        width: 500px;
        clear: both;

    			}
    .container input {
        width: 100%;
        clear: both;
    		}
	</style>
	    <img src="cd.jpg" alt="HTML5 Icon" style="width:1270px;height:200px;">
		<title>GM Shop Movie and Game</title>
	</head>
<body>
<h1>Please select a customer to edit</h1>


<form method = "POST">
		<!-- <input type = "TEXT" name = "search" placeholder="Type here...#47E1A6"#47D2E9 />-->

	<?php
	error_reporting(E_ALL & ~E_NOTICE);

	$cust = $_GET['var'];

	if($cust == null)
	{
			if(isset($_POST['submit'])){
			$example = $_POST["search"];
			}
		?>
		
		<select name = "search">
			<option value = "">Select Customer</option>
			<?php
			   $query = "Select cust_fname, cust_lname from customer";
			   $mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");
			   $results = mysqli_query($mysqli,$query);

			   foreach ($results as $customer)
			   {
			   	?>
			   	<option <?php if (isset($example) && $example==$customer['cust_fname']) echo "selected";?> value = "<?php echo $customer['cust_fname'];?>"> <?php echo $customer["cust_fname"]. ' ' .$customer["cust_lname"];?></option>
			   	<?php
			   }
			   ?>
			
		<input type = "SUBMIT" name = "submit" value = "Select"/>
	<?php
	}
	?>
<?php
$output = NULL;
$row['cust_fname'] = NULL;
$row['cust_lname'] = NULL;
$row['ph_num'] = NULL;
$row['street'] = NULL;
$row['state'] = NULL;
$row['city'] = NULL;
$row['zip'] = NULL;
$row['cust_id'] = NULL;


if(isset($_POST['submit']) or $cust != null){
	//database connection
	$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");

	// Get a connection for the database
	//require_once('../mysqli_connect.php');
	if($cust == null)
	{
		$search = $mysqli->real_escape_string($_POST['search']);
		//fetch data from db
		$resultSet = $mysqli->query("SELECT cust_id,cust_fname, cust_lname, ph_num, street,city,state,zip
		  FROM customer
		  WHERE cust_fname LIKE '%$search%'");
	}
	else{
		$resultSet = $mysqli->query("SELECT cust_id,cust_fname, cust_lname, ph_num, street,city,state,zip
		  FROM customer
		  WHERE  cust_id = '$cust'");
		}

		if($resultSet->num_rows>0)
		{
			$row = $resultSet->fetch_assoc();
		}
		else{
		$output = "No results";
		}
}
?>
</form>
<div class="container">
				<form action="CustDetailsUpdate.php" method="post">
				    <p>Customer Id  : <input align="right" type="text" name="cust_id" value = "<?php echo $row['cust_id'];?>" readonly></p>
					<p>First Name  : <input align="right" type="text" name="fname" value = "<?php echo $row['cust_fname'];?>"></p>
					<p>Last Name   : <input align="right" type="text" name="lname" value = "<?php echo $row['cust_lname'];?>"></p>
					<p>Phone Number: <input align="right" type="text" name="phnum" value = "<?php echo $row['ph_num'];?>"></p>
					<p>Street      : <input align="right" type="text" name="street" value = "<?php echo $row['street'];?>"></p>
					<p>City        : <input align="right" type="text" name="city" value = "<?php echo $row['city'];?>"></p>
					<p>State       : <input align="right" type="text" name="state" value = "<?php echo $row['state'];?>"></p>
					<p>Zip         : <input align="right" type="text" name="zip" value = "<?php echo $row['zip'];?>"></p>
					<input type="submit">
				</form>
</div>

</body>
</html>