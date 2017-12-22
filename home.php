
<!DOCTYPE html>
	<html>
	<head>
	<style>
		body {
    			background-color: #DAF7A6		
             }
       	div {
		    background-color: #A8C631;
		    }

		div:hover {

    		cursor: pointer;
		}

		.button {
			border-radius: 8px;
		  	cursor:pointer;
		}
		.button:hover {
    		background-color: #A8C631; /* Green */
    		color: white;
		}
		.button:active {
		  background-color: #A8C631;
		  transform: translateY(4px);
		}

	</style>
	<img src="cd.jpg" alt="HTML5 Icon" style="width:1270px;height:200px;">
	<title>GM Shop Movie and Game</title>
	</head>
	<body align = "center" >
	<h1 align = "center"> GM Shop Movies and Games Rental/Purchase</h1>

	<p align = "center">GM shop is a games and movies store. It offers a range of collection of their products for rent or/and for buying products. It offers affordable prices and holds a lot of product for customer satisfaction. It is situated at Austin, Houston and Dallas and serves almost all of our community.</p>

	 <table align="center"
		cellspacing="10" cellpadding="8">
		<tr><td align="center"><br></td>

		<td align="center"><br><h2 > Are you a </h2></td>
	 	
	 	 <td align="left"><br><form action="EmpAuth.php" method="get">
		<!-- <input type = "TEXT" name = "search" placeholder="Type here...#47E1A6"#47D2E9#D4E247  />-->
		
		<input type = "SUBMIT" name = "submitEmp" value = "Employee" class = "button" style="font-size : 20px;height:120px;width:120px"/>

	    </form></br></td>
	
	 	<td align="center"><br><h2> Or </h2></br></td>

	 	<td align="center"><br><form action="custAuth.php" method="get">
		<!-- <input type = "TEXT" name = "search" placeholder="Type here...#47E1A6"#47D2E9 />-->
		<input type = "SUBMIT" name = "submitCust" value = "Customer" class = "button" style="font-size : 20px;height:120px;width:120px"/>
		</form></br></td>

		<td align="center"><br><h2> Or </h2></br></td>

		<td align="center"><br><form action="searchUser.php" method="get">
		<input type = "SUBMIT" name = "submitUser" value = "Stand Alone User" class = "button" style="font-size : 20px;height:120px;width:120px white-space: normal;"/>
		</form></br></td></tr>
	</table>

	<div>
		<form>
		<table align = "bottom">
		<tr><td align = "center">
		<br><a style="color:white" href = "developer.php"><label style="color:white">Developers</label></br>
		</td>

		<td align = "center">
		<br><a style="color:white" href = "ContactUs.php"><label style="color:white">Contact Us</label></br>
		</td>

		<td align = "center">
		<br><a style="color:white" href = "privacy.php"><label style="color:white">Privacy & Security</label></br>
		</td>

		<td align = "center">
		<br><a style="color:white" href = "feedback.php"><label style="color:white">Feedback</label></br>
		</td>

		<td align = "center">
		<br><a style="color:white" href = "returnPolicy.php"><label style="color:white">Return Policy</label></br>
		</td></tr>
		</table>
		</form>
	</div>

</body>
</html>