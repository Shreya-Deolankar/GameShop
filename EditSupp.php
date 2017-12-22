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
<h1>Please select a Supplier to edit</h1>


<form method = "POST">
		<!-- <input type = "TEXT" name = "search" placeholder="Type here...#47E1A6"#47D2E9 />-->

		<?php
		error_reporting(E_ALL & ~E_NOTICE);
		$supplier_id = $_GET['var'];

		if($supplier_id == null)
		{
			if(isset($_POST['submit'])){
			$example = $_POST["search"];
			}
		?>
		
		<select name = "search">
			<option value = "">Select Supplier</option>
			<?php
			   $query = "Select supplier_name from supplier";
			   $mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");
			   $results = mysqli_query($mysqli,$query);

			   foreach ($results as $supplier)
			   {
			   	?>
			   	<option <?php if (isset($example) && $example==$supplier['supplier_name']) echo "selected";?> value = "<?php echo $supplier['supplier_name'];?>"> <?php echo $supplier["supplier_name"];?></option>
			   	<?php
			   }
			   ?>
			
		<input type = "SUBMIT" name = "submit" value = "Select"/>

		<?php
	}
	?>
<?php
$output = NULL;
$row['supplier_name'] = NULL;
$row['ph_num'] = NULL;
$row['street'] = NULL;
$row['state'] = NULL;
$row['city'] = NULL;
$row['zip'] = NULL;
$row['supplier_id'] = NULL;

if(isset($_POST['submit']) or  $supplier_id != null){
	//database connection
	$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");

	// Get a connection for the database
	//require_once('../mysqli_connect.php');

	if($supplier_id == null)
	{

	$search = $mysqli->real_escape_string($_POST['search']);
	//fetch data from db

	$resultSet = $mysqli->query("SELECT supplier_id,supplier_name, ph_num, street,city,state,zip
		  FROM supplier
		  WHERE supplier_name LIKE '%$search%'");
	}
	else
	{
		$resultSet = $mysqli->query("SELECT supplier_id,supplier_name, ph_num, street,city,state,zip
		  FROM supplier
		  WHERE supplier_id = '$supplier_id'");

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
				<form action="SuppUpdate.php" method="post">
				    <p>Supplier Id  : <input align="right" type="text" name="supplier_id" value = "<?php echo $row['supplier_id'];?>" readonly></p>
					<p>First Name  : <input align="right" type="text" name="supplier_name" value = "<?php echo $row['supplier_name'];?>"></p>
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