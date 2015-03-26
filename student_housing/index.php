<?php
	session_start();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Student Housing Management Mini System</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="all">
	
</head>
<body>
	<script src="jquery.js"></script>
	<script>
	$(document).ready(function() {

	});
	</script>
<?php

	include "header.php";
?>
<section>
<?php 
	if (!empty($_SESSION['loggedin']) && ($_SESSION['loggedin'] == 1))
	{
		$nl = "<br />";
		include "database.php";

		$username = $_SESSION['username'];
		$peopleType = $_SESSION['peopleType'];
		$peopleID = $_SESSION['peopleID'];
        
        
		if(!strcmp($peopleType,"student"))
			echo "Logged in as student<br>";
		else if(!strcmp($peopleType,"guest"))
			echo "Logged in as guest<br>";
		else
			echo "Logged in as staff<br>";
            header('Location: admin_dashboard.php');
		
		$mysqli = connect_db();

		$sql_query = "SELECT * FROM `student_housing`.`univ_people` u WHERE u.peopleID = '$peopleID';";
	
		$result = $mysqli->query($sql_query);
		if ($result == FALSE) {
			echo "Query failed: ".$mysqli->error.$nl;
		}
		else {
			$row = mysqli_fetch_assoc($result);
			$dob = $row['dateOfBirth'];
			echo $dob."<br>";
		}
	}
	else 
	{

?>
<br /><br />
<div id="Title">Sign In</div>
	<div id="login-form">
		<div id="inner-login-form">
		<form action="login.php" method=POST >
			<span class="form-label"><label for="Username"><strong>Username</strong></label></span>
			<input name="Username" id="Username" type="text" class="text"/>
			<br /><br />
			<span class="form-label"><label for="Password"><strong>Password</strong></label><em> &nbsp&nbsp <a href="">Forgot your password?</a></em></span>
			<input name="Password" id="Password" type="password" class="text"/><br /><br />
			<input value="Log in!" type="submit" align="middle" style="width:22.5%; height:35px" />
		</form>
		</div>
	</div>
<?php
	}
?>
</section>
</body>
</html>