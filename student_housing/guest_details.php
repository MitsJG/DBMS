<html>
<strong>Guest Details: </strong>
<div id='details'>

<?php 
session_start();    
include "database.php";


$mysqli = connect_db();
$nl ="<br /><br />";	
$querySuccessString="Query executed succesfully ! ";
$reqID="" ;



$guestID=$_SESSION['peopleID'];
// Getting values from Table Lease_Request 
$sql_query = "SELECT * FROM Univ_People WHERE peopleID='".$guestID."'";


echo "Displaying results for Selected Guest : ".$guestID.$nl;



$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $querySuccessString.$nl;

            while($row = mysqli_fetch_assoc($result)) {
                $ID= $row['peopleID'] ;
                
?>   
    
            People ID                :                 <?php echo $ID ; ?><br/>    
			Current Status           :                <?php echo $row['currentStatus']; ?><br/>    
			Category                 :                <?php echo $row['category']; ?><br/>    
            Date of Birth            :                <?php echo $row['dateOfBirth']; ?><br/>    
            Availability             :                 <?php echo $row['available']; ?><br/>    
			Sex                      :                <?php echo $row['sex']; ?><br/>    
			Program                  :                <?php echo $row['program']; ?><br/>    
            Special Needs            :                <?php echo $row['specialNeeds']; ?><br/>   
			Current Status           :                <?php echo $row['currentStatus']; ?><br/>    
			Nationality              :                <?php echo $row['nationality']; ?><br/>    
            Course Name              :                <?php echo $row['courseName']; ?><br/>    
            Phone                    :                 <?php echo $row['phone']; ?><br/>    
			Alternate Phone          :                <?php echo $row['alternatePhone']; ?><br/>    
			First Name               :                <?php echo $row['firstName']; ?><br/>    
            Last Name                :                <?php echo $row['lastName']; ?><br/>         
            Additional Comments      :                <?php echo $row['additionalComments']; ?><br/>    
            Address ID               :                 <?php echo $row['addressID']; ?><br/>    
			Housing ID               :                <?php echo $row['housingID']; ?><br/>    
			Lease ID                 :                <?php echo $row['leaseID']; ?><br/>    
            Permit ID                :                <?php echo $row['permitID']; ?><br/>          
    
<?php                
                
            }

            
}

?>    
    
<br />
</div>

<div id='guestOptions'>
<br />
<a href="#">Housing Option</a>  <br />  
<a href="#">Parking Option</a>  <br />  
<a href="#">Maintenance</a>     <br /> 
<!-- <a href="#">Profile</a> -->    
</div>
    
<div id='goBack'>
<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>
</div>       
    
</html>