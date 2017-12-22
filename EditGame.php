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
<h1>Please select a product to edit</h1>

		
<form method = "POST">
		<!-- <input type = "TEXT" name = "search" placeholder="Type here...#47E1A6"#47D2E9 />-->

		<?php
			if(isset($_POST['submit'])){
			$example = $_POST["search"];
			}
		?>
		<select name = "search">
			<option value = "">Select Game</option>
			<?php
			   $query = "Select product_id,product_name, product_type from product where product_type = 'Game'";
			   $mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");
			   $results = mysqli_query($mysqli,$query);

			   foreach ($results as $product)
			   {
			   	?>
			   	<option <?php if (isset($example) && $example==$product['product_id']) echo "selected";?> value = "<?php echo $product['product_id'];?>"> <?php echo $product["product_name"];?></option>
			   	<?php
			   }
			   ?></select>

			
		<input type = "SUBMIT" name = "submit" value = "Select"/>

	<br><select name = "searchCategory">
			<option value = "">Select Category</option>
			<?php
				$search = $mysqli->real_escape_string($_POST['search']);

			   $query2 = "Select category_name from category where product_id = '$search'";
			   //$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");
			   $results2 = mysqli_query($mysqli,$query2);

			   foreach ($results2 as $category)
			   {
			   	?>
			   	<option value = "<?php echo $category['category_name'];?>"> <?php echo $category["category_name"];?></option>
			   	<?php
			   }
			   ?></select></br>

	<br><select name = "searchLocation">
			<option value = "">Select Location</option>
			<?php
				$search = $mysqli->real_escape_string($_POST['search']);

			   $query4 = "Select location from inventory where product_id = '$search'";
			   //$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");
			   $results4 = mysqli_query($mysqli,$query4);

			   foreach ($results4 as $inventory)
			   {
			   	?>
			   	<option value = "<?php echo $inventory['location'];?>"> <?php echo $inventory["location"];?></option>
			   	<?php
			   }
			   ?></select></br>

	<select name = "searchAward">
			<option value = "">Select Award</option>
			<?php
				$search = $mysqli->real_escape_string($_POST['search']);

			   $query3 = "Select award_name from award where product_id = '$search'";
			  // $mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");
			   $results3 = mysqli_query($mysqli,$query3);

			   foreach ($results3 as $award)
			   {
			   	?>
			   	<option value = "<?php echo $award['award_name'];?>"> <?php echo $award["award_name"];?></option>
			   	<?php
			   }
			   ?></select>
			
	<input type = "SUBMIT" name = "submit1" value = "Submit"/> 
 

<?php
$output = NULL;
$row['product_id'] = NULL;
$row['product_name'] = NULL;
$row['location'] = NULL;
$row['num_of_copies'] = NULL;
$row['product_type'] = NULL;
$row['year'] = NULL;
$row['publisher'] = NULL;
$row['platform'] = NULL;
$row['award_name'] = NULL;
$row['category_name'] = NULL;

if(isset($_POST['submit1'])){
	//database connection
	$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");

	// Get a connection for the database
	//require_once('../mysqli_connect.php');

	$search = $mysqli->real_escape_string($_POST['search']);
	$searchAward = $mysqli->real_escape_string($_POST['searchAward']);
	$searchLocation = $mysqli->real_escape_string($_POST['searchLocation']);
	$searchCategory = $mysqli->real_escape_string($_POST['searchCategory']);


	//fetch data from db
	try
	{
	$resultSet = $mysqli->query("SELECT p.product_id,p.product_name, i.location, i.num_of_copies, p.product_type,p.year, g.publisher,g.platform,aw.award_name,c.category_name
		 FROM game g left outer join award aw on g.product_id = aw.product_id 
		 left outer join category c on g.product_id = c.product_id 
		 JOIN product p on g.product_id = p.product_id 
		 left outer join inventory i on g.product_id = i.product_id
		WHERE p.product_id = '$search'
		AND i.location LIKE '%$searchLocation%'
		OR aw.award_name LIKE '%$searchAward%'
		OR c.category_name LIKE '%$searchCategory%'");
	}
	catch (PDOException $e)
		{
		$error = 'Error fetching entries: ' . $e->getMessage();
		include 'error.html.php';
		exit();
		}

		if($resultSet->num_rows>0)
		{

			$row = $resultSet->fetch_assoc();
			
		}
		else{
		$output = "No results";
		echo $output;
		}
}
?>
</form>
<div class="container">
				<form action="GameUpdate.php" method="post">
					<p>Product Id  : <input align="right" type="text" name="product_id" value = "<?php echo $row['product_id'];?>" readonly></p>
				    <p>Game Name  : <input align="right" type="text" name="product_name" value = "<?php echo $row['product_name'];?>"></p>
					<p>Location      : <input align="right" type="text" name="location" value = "<?php echo $row['location'];?>" readonly></p>
					<p>Number of Copies: <input align="right" type="text" name="num_of_copies" value = "<?php echo $row['num_of_copies'];?>"></p>
					<p>Year: <input align="right" type="text" name="year" value = "<?php echo $row['year'];?>"></p>
					<p>Publisher: <input align="right" type="text" name="publisher" value = "<?php echo $row['publisher'];?>"></p>
					<p>Platform: <input align="right" type="text" name="platform" value = "<?php echo $row['platform'];?>"></p>
					<p>Award: <input align="right" type="text" name="award" value = "<?php echo $row['award_name'];?>" readonly></p>
					<p>Category: <input align="right" type="text" name="category" value = "<?php echo $row['category_name'];?>" readonly></p>
					<input type="submit">
				</form>
</div>

</body>
</html>