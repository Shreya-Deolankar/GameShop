
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
<h1>Please Add Inventory Details</h1>
<div class="container">
	<form action="inventory.php" method="post">
	<p>Movie Name  : <input align="right" type="text" name="product_name"></p>
	<p>Location      : <input align="right" type="text" name="location"></p>
	<p>Number of Copies: <input align="right" type="text" name="num_of_copies"></p>
	<p>Year: <input align="right" type="text" name="year"></p>
	<p>Director: <input align="right" type="text" name="director"></p>
	<p>Actor: <input align="right" type="text" name="actor"></p>
	<p>Actress: <input align="right" type="text" name="actress"></p>
	<p>Award: <input align="right" type="text" name="award"></p>
	<p>Category: <input align="right" type="text" name="category"></p>
	<input type="submit">
	</form>
</div>
</body>
</html>