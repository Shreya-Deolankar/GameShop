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
<h1>Please select a dependent to edit</h1>


<form method = "POST">
		<!-- <input type = "TEXT" name = "search" placeholder="Type here...#47E1A6"#47D2E9 />-->

		<?php

		error_reporting(E_ALL & ~E_NOTICE);

		$ssn = $_GET['var'];
		$dep_name = $_GET['val'];

		echo $dep_name;

		if($ssn == null)
		{
			if(isset($_POST['submit'])){
			$example = $_POST["search"];
			}

			session_start();
			$emp_ssn = $_SESSION['varname'];
			$_SESSION['varname'] = $emp_ssn;
		?>
		
		<select name = "search">
			<option value = "">Select Dependent</option>
			<?php
			   $query = "Select dep_name from dependent where essn like '%$emp_ssn%'";
			   $mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");
			   $results = mysqli_query($mysqli,$query);

			   foreach ($results as $dependent)
			   {
			   	?>
			   	<option <?php if (isset($example) && $example==$dependent['dep_name']) echo "selected";?> value = "<?php echo $dependent['dep_name'];?>"> <?php echo $dependent["dep_name"];?></option>
			   	<?php
			   }
			   ?>
			
		<input type = "SUBMIT" name = "submit" value = "Select"/>

		<?php
	}
	?>
<?php

$output = NULL;
$row['dep_name'] = NULL;
$row['relation'] = NULL;
$row['dob'] = NULL;
$row['essn'] = NULL;

if(isset($_POST['submit']) or $ssn != null){
	//database connection
	$mysqli = NEW Mysqli("localhost","root","dbproject","gameshop");

	// Get a connection for the database
	//require_once('../mysqli_connect.php');
	if($ssn == null)
	{

	$search = $mysqli->real_escape_string($_POST['search']);


	//fetch data from db

	$resultSet = $mysqli->query("SELECT essn,dep_name, relation,dob 
		  FROM dependent
		  WHERE essn LIKE '%$emp_ssn%'");
	}
	else{
		$resultSet = $mysqli->query("SELECT essn,dep_name, relation,dob 
		  FROM dependent
		  WHERE essn = '$ssn'
		  AND dep_name LIKE '%$dep_name%'");
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
				<form action="DepUpdate.php" method="post">
				    <p>ESSN : <input align="right" type="text" name="essn" value = "<?php echo $row['essn'];?>" readonly></p>
					<p>Dependent Name  : <input align="right" type="text" name="dep_name" value = "<?php echo $row['dep_name'];?>"></p>
					<p>Relation   : <input align="right" type="text" name="relation" value = "<?php echo $row['relation'];?>"></p>
					<p>Date of Birth: <input align="right" type="text" name="dob" value = "<?php echo $row['dob'];?>"></p>
					<input type="submit">
				</form>
</div>

</body>
</html>