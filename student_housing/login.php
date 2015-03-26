<?php
	session_start();
	if (!empty($_POST['Username']) && !empty($_POST['Password']))
	{
		include "database.php";

		$username = $_POST['Username'];
		$password = $_POST['Password'];
		
		// TODO: Check for MySQL Injection?
		
		// Authenticate
		$mysqli = connect_db();
		$login = 'Login';
		//$password = md5($password);
		
		$sql_query = "SELECT * FROM $login WHERE username = '$username'";
		$result = $mysqli->query($sql_query);
		if ($result == FALSE) {
			echo "Query failed: ".$mysqli->error.$nl;
		}
		else if ($result->num_rows == 1) {
			// We got a row, now check if the password is OK
			$row = $result->fetch_assoc();

			if ($row['password'] == $password)
			{
				$_SESSION['loggedin'] = 1;
				$_SESSION['username'] = $username;
				
                
                //$_SESSION['fullname'] = $row['firstName']." ".$row['lastName'];
                // Didn't consider what is below and what is above 
				//$peopleID = $_SESSION['peopleID'] = $row['peopleID'];
				
                $sql_query_peopleID = "SELECT * FROM Univ_People WHERE peopleID= '$username'";
                $result_peopleID = $mysqli->query($sql_query_peopleID);
                if ($result_peopleID == FALSE) {
                    echo "Query failed: ".$mysqli->error.$nl;
                }
                else
                {
                    $row = $result_peopleID->fetch_assoc();
                    {
                        $_SESSION['fullname'] = $row['firstName']." ".$row['lastName'];

                        $peopleID = $_SESSION['peopleID'] = $row['peopleID'];                                        
                    }

                }
                
                
                $checkPeopleType = substr($peopleID,0,1);
				//echo $checkPeopleType."<br>";
				if($checkPeopleType == 'S')
					$_SESSION['peopleType'] = 'student';
				else if($checkPeopleType == 'H')
					$_SESSION['peopleType'] = 'staff';
				else
					$_SESSION['peopleType'] = 'guest';
				$result->close();
				//echo "<br>".$peopleID;
				//echo "<br>".$_SESSION['peopleType'];
				header('Location: index.php');
			}
            //echo "The problemi is here".$password;
			// Wrong Password
			header('Location: index.php');
		}
		else
		{
			// Username doesn't exist (or multiple usernames?)
			// TODO: Remove this
			header('Location: index.php');
            
		}
	}
	
	header('Location: index.php');
?>