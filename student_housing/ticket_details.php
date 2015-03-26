<html>


<?php 
    
include "database.php";


$mysqli = connect_db();
$nl ="<br /><br />";	
$querySuccessString="Query executed succesfully ! ";
$ticketID="" ;



$ticketID=$_GET['ticketID'];
// Getting values from Table Lease_Request 
$sql_query = "SELECT * FROM Maintenance_Ticket WHERE ticketID='".$ticketID."'";


echo "Displaying results for Ticket ID: ".$ticketID.$nl;



$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $querySuccessString.$nl;

            
            //$row = mysqli_fetch_assoc($result);
            while($row = mysqli_fetch_assoc($result)) {
                $ticketID= $row['ticketID'] ;
                
?>   
    
			Ticket ID                :                <?php echo $ticketID ; ?><br/>    
			Approval Status          :                <?php echo $row['approvalStatus']; ?><br/>    
			Inspection Date          :                <?php echo $row['inspectionDate']; ?><br/>    
			Damage Charges           :                <?php echo $row['damageCharges']; ?><br/>    
			Ticket Status            :                <?php echo $row['ticketStatus']; ?><br/>    
			Ticket Severity          :                <?php echo $row['ticketSeverity']; ?><br/>    
			Ticket Type              :                <?php echo $row['ticketType']; ?><br/>        
			Student ID               :                <?php echo $row['studentID']; ?><br/>        
            Staff ID                 :                <?php echo $row['staffID']; ?><br/>        
			House ID                 :                <?php echo $row['houseID']; ?><br/>            
    
<?php                
                
            }

            
}

?>
<br />
<div id='updateForm'>
<strong> Want to update status?</strong> <br />
<form action='ticket_details.php?ticketID=<?php echo $ticketID; ?>' method='POST' name='ticket_update' >
Enter Status: <input type='text' name='statusTextBox' id='statusTextBox'></input>
<br />    
<input type='submit' value='Update'>
</form>
<br />    
</div>  

<?php 

    $status = null ;
    if(isset($_POST['statusTextBox']))
    {
        $status = $_POST['statusTextBox'];
        //$status = $_GET['statusTextBox'];    
    }

    if($status != null)
    {
        // Getting values from Table Lease_Request 
        $ticketID = $_GET['ticketID'];
        $sql_update_query = "UPDATE Maintenance_Ticket SET ticketStatus ='".$status."' WHERE ticketID='".$ticketID."'" ;
        $sql_update_result = $mysqli->query($sql_update_query);
        if ($sql_update_result == FALSE)
        {
                echo "Query failed: ".$mysqli->error.$nl;
        }    
        else
        {
                    echo "Updated succesfully ! ".$nl;
        }    
        
        echo "Displaying results for Ticket ID: ".$ticketID.$nl;


        $sql_query = "SELECT * FROM Maintenance_Ticket WHERE ticketID='".$ticketID."'";
        $result = $mysqli->query($sql_query);
        if ($result == FALSE)
        {
                echo "Query failed: ".$mysqli->error.$nl;
        }    
        else
        {
                    echo $querySuccessString.$nl;


                    //$row = mysqli_fetch_assoc($result);
                    while($row = mysqli_fetch_assoc($result)) {
                        $leaseReqID= $row['ticketID'] ;

        ?>   

    
			Ticket ID                :                <?php echo $ticketID ; ?><br/>    
			Approval Status          :                <?php echo $row['approvalStatus']; ?><br/>    
			Inspection Date          :                <?php echo $row['inspectionDate']; ?><br/>    
			Damage Charges           :                <?php echo $row['damageCharges']; ?><br/>    
			Ticket Status            :                <?php echo $row['ticketStatus']; ?><br/>    
			Ticket Severity          :                <?php echo $row['ticketSeverity']; ?><br/>    
			Ticket Type              :                <?php echo $row['ticketType']; ?><br/>        
			Student ID               :                <?php echo $row['studentID']; ?><br/>        
            Staff ID                 :                <?php echo $row['staffID']; ?><br/>        
			House ID                 :                <?php echo $row['houseID']; ?><br/>            

        <?php                

                    }


        }        
    }



?>
<div id='goBack'>
<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>
</div>   
</html>