<?php
$output = NULL;

?>

<!DOCTYPE html>
	<html>
	<head>
	<style>
		body {
    			background-color: #DAF7A6   		
             }
         div {
		    	background-color: black ;
		    }
	</style>
	    <img src="cd.jpg" alt="HTML5 Icon" style="width:1270px;height:200px;">
		<title>GM Shop Movie and Game</title>
	</head>
	<body>
	<h1 align = "center"> GM Shop Movies and Games Rental/Purchase</h1>

	 <table align="top" cellspacing="5" cellpadding="8">
		<tr><td><br><form align="left" action="home.php" method="get">
		
		<input type = "SUBMIT" name = "home" value = "Home" style="font-size : 14px;height:35px;width:105px"/>

	    </form></td>
		</tr>
	 <tr><td align="left"><label>Please search for a movie</label>

	 	<form method = "POST">
		<!-- <input type = "TEXT" name = "search" placeholder="Type here...#47E1A6"#47D2E9 #D4E247/>-->
		<select name = "search">
			<option value = "">Select Movie</option>
			<?php
			   $query = "Select product_name from search_movie";
			   $mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");
			   $results = mysqli_query($mysqli,$query);

			   foreach ($results as $search_movie)
			   {
			   	?>
			   	<option value = "<?php echo $search_movie["product_name"];?>"> <?php echo 'Movie'. ' '.$search_movie["product_name"];?></option>
			   	<?php
			   }
			   ?>

			 <?php
			   $query1 = "Select distinct category_name from category where product_id in (select product_id from product where product_type = 'Movie')";
			   $results1 = mysqli_query($mysqli,$query1);

			   foreach ($results1 as $category)
			   {
			   	?>
			   	<option value = "<?php echo $category["category_name"];?>"> <?php echo 'Category'. ' '.$category["category_name"];?></option>
			   	<?php
			   }
			   ?>
			   <?php
			   $query2 = "Select distinct actor_name from actor";
			   $results2 = mysqli_query($mysqli,$query2);

			   foreach ($results2 as $actor)
			   {
			   	?>
			   	<option value = "<?php echo $actor["actor_name"];?>"> <?php echo 'Actor'. ' '.$actor["actor_name"];?></option>
			   	<?php
			   }
			   ?>
			 <?php
			   $query3 = "Select director from search_movie";
			   $results3 = mysqli_query($mysqli,$query3);

			  foreach ($results3 as $search_movie)
			   {
			   	?>
			   	<option value = "<?php echo $search_movie["director"];?>"> <?php echo 'Director'. ' '.$search_movie["director"];?></option>
			   	<?php
			   }
			   ?>
		</select>
		<input type = "SUBMIT" name = "submit" value = "Search"/>

	    </form></td>
		<td align="left"><label> Please search for a game </label>
	 	<form method = "POST">
		<!-- <input type = "TEXT" name = "search" placeholder="Type here...#47E1A6"#47D2E9 />-->
		<select name = "searchGame">
			<option value = "">Select Game</option>
			<?php
			   $mysqliConn = NEW Mysqli("localhost","root","dbproject","gameshop");
			   $queryGame = "Select * from search_game";
			   $resultsGame = mysqli_query($mysqliConn,$queryGame);

			   foreach ($resultsGame as $search_game)
			   {
			   	?>
			   	<option value = "<?php echo $search_game["product_name"];?>"> <?php echo 'Game'. ' '.$search_game["product_name"];?></option>
			   	<?php
			   }
			   ?>

			  <?php
			   foreach ($resultsGame as $search_game)
			   {
			   	?>
			   	<option value = "<?php echo $search_game["developer"];?>"> <?php echo 'Developer'. ' '. $search_game["developer"];?></option>
			   	<?php
			   }
			   ?>

			   <?php
			   $query2 = "Select distinct category_name from category where product_id in (select product_id from product where product_type = 'Game')";
			   $results2 = mysqli_query($mysqli,$query2);

			   foreach ($results2 as $category)
			   {
			   	?>
			   	<option value = "<?php echo $category["category_name"];?>"> <?php echo 'Category'. ' '.$category["category_name"];?></option>
			   	<?php
			   }
			   ?>

			 </select>

		<input type = "SUBMIT" name = "submitGame" value = "Search"/>

	    </form></td>

	</body>
	</html>


	<?php

if(isset($_POST['submit'])){
	//database connection
	$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");

	// Get a connection for the database
	//require_once('../mysqli_connect.php');

	$search = $mysqli->real_escape_string($_POST['search']);


	//fetch data from db

	$resultSet = $mysqli->query("SELECT product_name,unit_price_pur, unit_price_rent,rating,year, director,actor_name,genre,availability
		  FROM search_movie
		  WHERE product_name LIKE '%$search%'
		  OR genre LIKE '%$search%'
		  OR director LIKE '%$search%'
		  OR actor_name LIKE '%$search%'");

		if($resultSet->num_rows>0){

			echo '<table align="center"
				cellspacing="5" cellpadding="8" bgcolor="#A8C631">

				</tr><tr><td align="left"><b>Movie Name</b></td>
				<td align="left"><b>Rating</b></td>
				<td align="left"><b>Year</b></td>
				<td align="left"><b>Director</b></td>
				<td align="left"><b>Genre</b></td></b></td>
				<td align="left"><b>Actor</b></td></b></td>
				<td align="left"><b>Purchase Price</b></td></b></td>
				<td align="left"><b>Rental Price</b></td></b></td>
				<td align="left"><b>Availability</b></td></tr>';
			while($row = $resultSet->fetch_assoc())
			{
				$pname = $row['product_name'] ;
				echo '<tr><td align="left">' .  
				$row['product_name'] . '</td><td align="left">' . 
				$row['rating'] . '</td><td align="left">' .
				$row['year'] . '</td><td align="left">' .
				$row['director'] . '</td><td align="left">' .
				$row['genre'] . '</td><td align="left">' .
				$row['actor_name'] . '</td><td align="left">'.
				$row['unit_price_pur'] . '</td><td align="left">'.
				$row['unit_price_rent'] . '</td><td align="left">'.
				$row['availability'] . '</td><td align="left">';

				echo '</tr>';
			}
		}
		else{
		$output = "No results";
		}
	}
	if(isset($_POST['submitGame'])){
	//database connection
	$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");

	// Get a connection for the database
	//require_once('../mysqli_connect.php');


	$searchGame = $mysqli->real_escape_string($_POST['searchGame']);
	//fetch data from db

	$resultGame = $mysqli->query("SELECT *
		  FROM search_game
		  WHERE product_name LIKE '%$searchGame%'
		  OR developer LIKE '%$searchGame%'
		  OR category_name LIKE '%$searchGame%'");

		if($resultGame->num_rows>0){

			echo '<table align="center"
				cellspacing="5" cellpadding="8" bgcolor="#A8C631">

				</tr><tr><td align="left"><b>Game Name</b></td>
				<td align="left"><b>Rating</b></td>
				<td align="left"><b>Game Type</b></td>
				<td align="left"><b>Developer</b></td>
				<td align="left"><b>Platform</b></td>
				<td align="left"><b>Award</b></td>
				<td align="left"><b>Purchase Price</b></td></b></td>
				<td align="left"><b>Rental Price</b></td></b></td>
				<td align="left"><b>Availability</b></td></tr>';

			while($row = $resultGame->fetch_assoc())
			{
				$pname = $row['product_name'] ;
				echo '<tr><td align="left">' . 
				$row['product_name'] . '</a></td><td align="left">' . 
				$row['rating'] . '</td><td align="left">' .
				$row['category_name'] . '</td><td align="left">' .
				$row['developer'] . '</td><td align="left">' .
				$row['platform'] . '</td><td align="left">' .
				$row['award_name'] . '</td><td align="left">'.
				$row['unit_price_pur'] . '</td><td align="left">'.
				$row['unit_price_rent'] . '</td><td align="left">'.
				$row['availability'] . '</td><td align="left">';

				echo '</tr>';
			}
		}
		else{
		$output = "No results";
		}
	 echo $output;
    }
	?>

<html>
<div>
		<form>
		<table align = "bottom">
		<tr><td align = "center">
		<br><a style="color:black" href = "developer.php"><label style="color:black">Developers</label></br>
		</td>

		<td align = "center">
		<br><a style="color:black" href = "ContactUs.php"><label style="color:black">Contact Us</label></br>
		</td>

		<td align = "center">
		<br><a style="color:black" href = "privacy.php"><label style="color:black">Privacy & Security</label></br>
		</td>

		<td align = "center">
		<br><a style="color:black" href = "feedback.php"><label style="color:black">Feedback</label></br>
		</td>

		<td align = "center">
		<br><a style="color:black" href = "returnPolicy.php"><label style="color:black">Return Policy</label></br>
		</td></tr>
		</table>
		</form>
	</div>
</html>