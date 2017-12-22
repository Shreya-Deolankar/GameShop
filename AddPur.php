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
<h1>Please enter purchase details</h1>


<form method = "POST">
		<!-- <input type = "TEXT" name = "search" placeholder="Type here...#47E1A6"#47D2E9 />-->

	<?php
	error_reporting(E_ALL & ~E_NOTICE);

	$cust = $_GET['var'];
	?>
		
		<select name = "search">
			<option value = "">Select Customer</option>
			<?php
			   $query = "Select cust_id,cust_fname, cust_lname from customer";
			   $mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");
			   $results = mysqli_query($mysqli,$query);

			   foreach ($results as $customer)
			   {
			   	?>
			   	<option  value = "<?php echo $customer['cust_id'];?>"> <?php echo $customer["cust_fname"]. ' ' .$customer["cust_lname"];?></option>
			   	<?php
			   }
			   ?>
		</select>
		<select name = "search1">
			<option value = "">Select Product</option>
			<?php
			   $query1 = "Select product_id,product_name from product";
			   $results1 = mysqli_query($mysqli,$query1);

			   foreach ($results1 as $product)
			   {
			   	?>
			   	<option  value = "<?php echo $product['product_id'];?>"> <?php echo $product["product_name"];?></option>
			   	<?php
			   }
			   ?>
		</select>
			
		<input type = "SUBMIT" name = "submit" value = "Select"/>
</form>
<?php

	if(isset($_POST['submit1'])){
		
		$date =$_POST['date'];
		$pid =$_POST['product_id'];
		//$pid =$_POST['product_id'];
		$location =$_POST['location'];
		$copies =$_POST['copies'];
		$price =$_POST['price'];
		$cust_id =$_POST['cust_id'];

		//database connection
		$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");
		
		// Get a connection for the database
		//require_once('../mysqli_connect.php');
		$resultSet = $mysqli->query("INSERT INTO purchase(product_id,bought_on,from_location,num_of_copies,price,customer_id)
						VALUES('$pid','$date','$location','$copies','$price','$cust_id')");

		if($resultSet){

		$resultSet1 = $mysqli->query("UPDATE INVENTORY SET num_of_copies = num_of_copies - '$copies'
						WHERE product_id = '$pid'
						AND location = '$location'");
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
		}
	}

	else
	{
		if(isset($_POST['submit'])){
		$search = $mysqli->real_escape_string($_POST['search']);
		$search1 = $mysqli->real_escape_string($_POST['search1']);
	
	?>
	
	<div class="container">
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
					    <p>Customer Id : <input align="right" type="text" name="cust_id" value = "<?php echo $search; ?>" readonly></p>
					    <p>Product Id : <input align="right" type="text" name="product_id" value = "<?php echo $search1; ?>" readonly></p>
						<p>Bought On(YYYY-MM-DD) : <input align="right" type="text" name="date"></p>
						<p>Location: <input align="right" type="text" name="location"></p>
						<p>Number of Copies: <input align="right" type="text" name="copies"></p>
						<p>Price        : <input align="right" type="text" name="price"></p>
						<input type="submit" name = "submit1">
					</form>
	<?php				
	}
}
?>
</div>

</body>
</html>
