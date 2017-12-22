<?php

//echo "please rate here";
$var = $_GET['var'];

session_start();

$cust_id = $_SESSION['varname'];

//$_SESSION['varname'] = $cust_id;

$output = '';
if(isset($_POST['submit'])){
	//database connection
	$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");

	// Get a connection for the database
	//require_once('../mysqli_connect.php');

	$mysqli->query("update product 
		set rating_count = rating_count + 1 
		where product_name ='$var'");

	$rate = $_POST['rate'];


	$resultSet0 = $mysqli->query("update rating 
		set rating_count = rating_count + 1, rating = $rate
		where customer_id= $cust_id 
		AND product_id = (select product_id from product where product_name ='$var')");
	
	if($mysqli->affected_rows>0){ }
	else
	{

	$resultSet1 = $mysqli->query("select product_id from product where product_name ='$var'");
	
		if($resultSet1->num_rows>0){
			while($row = $resultSet1->fetch_assoc())
			{

				$product_id = $row['product_id'];
				$resultSet2 = $mysqli->query("INSERT into rating(rating_count,rating,customer_id,product_id) 
								values(1, $rate, $cust_id,$product_id)");

				if($resultSet2 == false){
					//echo "error inserting";
				}
			}
		}
	}

	$resultSet = $mysqli->query("SELECT rating,rating_count 
		FROM product
		WHERE product_name = '$var' ");


		if($resultSet->num_rows>0){
			while($row = $resultSet->fetch_assoc())
			{
				$rating_count = $row['rating_count'];
				$temp_rating_count = $row['rating_count']-1;
				$rating = $row['rating'];
			    $rating = $rating*$temp_rating_count + $rate;
			    $rating = round($rating/$row['rating_count'],2);
				

				$mysqli->query("update product 
				set rating = $rating
				where product_name ='$var'");
			}
				
		}
		else{
		$output = "No results";
		}
	}
?>

<!DOCTYPE html>
	<html>
	<head>
	<style>
		body {
    	background-color: #DAF7A6 		
             }
	</style>
	    <img src="cd.jpg" alt="HTML5 Icon" style="width:1270px;height:200px;">
		<title>GM Shop Movie and Game</title>
	</head>
	<body>
	<h1 align = "centre"> GM Shop Movies and Games Rental/Purchase</h1>

	<table><tr><td align="left"><br><form align="left" action="home.php" method="get">
		
		<br><input type = "SUBMIT" name = "home" value = "Home" style="font-size : 14px;height:35px;width:105px"/> </br>

	    </form></br></td></tr>
	
	<tr><td><label> Please rate the Movie Or Game: <?php echo $var;?></label></td>
	 
	 	<td><form method = "POST">
		<!-- <input type = "TEXT" name = "search" placeholder="Type here...#47E1A6"#47D2E9 />-->
		<select name = "rate">
			<option value = "">Rate</option>
			<option value = 1>1 Star</option>
			<option value = 2>2 Star</option>
			<option value = 3>3 Star</option>
			<option value = 4>4 Star</option>
			<option value = 5>5 Star</option>
		</select></td>
		<td><input type = "SUBMIT" name = "submit" value = "Rate"/>
		</form></td>
		

	<td><?php 
		if(isset($_POST['submit'])){
	    echo "Thank you for your rating!!. The average rating is $rating based on $rating_count votes";
		}
	?></td></tr>
	</table>
	</body>
</html>

	<?php 

	require_once('../mysqli_connect.php');
    $query5 = "SELECT p.product_name, p.rating,p.year,p.image,m.director, GROUP_CONCAT(distinct a.actor_name) as actor_name, GROUP_CONCAT(distinct c.category_name) as genre,GROUP_CONCAT(distinct aw.award_name) as award 
    	FROM product p join movie m on p.product_id = m.product_id 
    	left outer join category c on p.product_id = c.product_id 
    	left outer join award aw on p.product_id = aw.product_id 
    	left outer join actor a on p.product_id = a.product_id 
    	where p.product_name ='$var' 
    	GROUP by p.product_name, p.rating,p.year,p.image,m.director";

	$query6 = "SELECT * FROM search_game where product_name ='$var' ";
		// Get a response from the database by sending the connection
		// and the query

		$response5 = @mysqli_query($dbc, $query5);
		$response6 = @mysqli_query($dbc, $query6);

		if($response5){

			while($row5 = mysqli_fetch_array($response5)){

				echo '<table align="left"
				cellspacing="5" cellpadding="8">';

				echo '<tr><td align="left"><img src="data:image/jpeg;base64,'.base64_encode( $row5['image'] ).'" alt="HTML5 Icon" style="width:128px;height:128px" align = "center"></td>';

				echo '<tr><td align="left"></br><b>Movie Name: </b>'.$row5['product_name'];
				
				if($row5['rating'] == 0)
				{
				echo '</br><b>Rating: </b>'.$row5['rating'];
				}
				else if($row5['rating']>0 and $row5['rating']<=1)
				{
				echo '</br><b>Rating: </b>'.$row5['rating']. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">';
				}
				else if($row5['rating']>1 and $row5['rating']<=2)
				{
				echo '</br><b>Rating: </b>'.$row5['rating']. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">';
				}
				else if($row5['rating']>2 and $row5['rating']<=3)
				{
				echo '</br><b>Rating: </b>'.$row5['rating']. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">';
				}
				else if($row5['rating']>3 and $row5['rating']<=4)
				{
				echo '</br><b>Rating: </b>'.$row5['rating']. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">';
				}
				else
				{
				echo '</br><b>Rating: </b>'.$row5['rating']. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">';
				}
				
				echo '</br><b>Year: </b>'.$row5['year'];
				echo '</br><b>Director: </b>'.$row5['director'];
				echo '</br><b>Actor: </b>'.$row5['actor_name'];
				echo '</br><b>Award: </b>'.$row5['award'];
				echo '</br><b>Category: </b>'.$row5['genre'].'</td></tr>' ;

			}

		} 
		else {

		echo "Couldn't issue database query<br />";

		echo mysqli_error($dbc);

		}


		if($response6){

			while($row6 = mysqli_fetch_array($response6)){

				echo '<table align="left"
				cellspacing="5" cellpadding="8">';

				echo '<tr><td align="left"><img src="data:image/jpeg;base64,'.base64_encode( $row6['image'] ).'" alt="HTML5 Icon" style="width:128px;height:128px" align = "center"></td>';

				echo '<tr><td align="left"></br><b>Game Name: </b>'.$row6['product_name'];

				if($row6['rating'] == 0)
				{
				echo '</br><b>Rating: </b>'.$row6['rating'];
				}
				else if($row6['rating']>0 and $row6['rating']<=1)
				{
				echo '</br><b>Rating: </b>'.$row6['rating']. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">';
				}
				else if($row6['rating']>1 and $row6['rating']<=2)
				{
				echo '</br><b>Rating: </b>'.$row6['rating']. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">';
				}
				else if($row6['rating']>2 and $row6['rating']<=3)
				{
				echo '</br><b>Rating: </b>'.$row6['rating']. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">';
				}
				else if($row6['rating']>3 and $row6['rating']<=4)
				{
				echo '</br><b>Rating: </b>'.$row6['rating']. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">';
				}
				else
				{
				echo '</br><b>Rating: </b>'.$row6['rating']. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">'. ' '.'<img src="star.png" alt="HTML5 Icon" style="width:15px;height:15px">';
				}
				echo '</br><b>Year: </b>'.$row6['year'];
				echo '</br><b>Developer: </b>'.$row6['developer'];
				echo '</br><b>Platform: </b>'.$row6['platform'];
				echo '</br><b>Award: </b>'.$row6['award_name'];
				echo '</br><b>Category: </b>'.$row6['category_name'].'</td></tr>' ;

			}

		} 
		else {

		echo "Couldn't issue database query<br />";

		echo mysqli_error($dbc);

		}
   
	echo $output; ?>