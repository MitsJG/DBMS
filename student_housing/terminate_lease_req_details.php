<html>


<?php 
    
include "database.php";


$mysqli = connect_db();
$nl ="<br /><br />";	
$querySuccessString="Query executed succesfully ! ";
$leaseReqID="" ;



$leaseReqID=$_GET['leaseReqID'];
// Getting values from Table Lease_Request 
$sql_query = "SELECT * FROM Terminate_Request WHERE RequestID='".$leaseReqID."'";


echo "Displaying results for Terminate Lease Request ID: ".$leaseReqID.$nl;



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
                $leaseReqID= $row['RequestID'] ;
                
?>   
    
            Request ID          :                <?php echo $leaseReqID ; ?><br/>    
			Student ID          :                <?php echo $row['studentID']; ?><br/>    
			Place ID            :                <?php echo $row['placeID']; ?><br/>    
            Terminate Date      :                <?php echo $row['terminateDate']; ?><br/>    
			Status              :                <?php echo $row['status']; ?><br/>    
            Inspection Date     :                <?php echo $row['inspectionDate']; ?><br/>    
    
    
<?php                
                
            }

            
}

?>
<br />
<div id='updateForm'>
<strong> Want to update status?</strong> <br />
<form action='terminate_lease_req_details.php?leaseReqID=<?php echo $leaseReqID; ?>' method='POST' name='lease_req_update' >
Enter Inspection Date: <input type='text' name='dateTextBox' id='dateTextBox'></input>
Enter Damage Fees: <input type='text' name='feeTextBox' id='feeTextBox'></input>    
<br />    
<input type='submit' value='Enter'>
</form>
<br />    
</div>  

<?php 

    $date = null ;
    $fees = null ;

    if(isset($_POST['dateTextBox']))
    {
        $date = $_POST['dateTextBox'];
        //$status = $_GET['statusTextBox'];    
    }

    if(isset($_POST['feeTextBox']))
    {
        $fees = $_POST['feeTextBox'];
        //$status = $_GET['statusTextBox'];    
    }

    if($date != null && $fees != null)
    {
        
        $date =  date("Y-m-d", strtotime($date));
        
        $sql_update_query = "UPDATE Terminate_Request SET inspectionDate ='".$date."' WHERE RequestID='".$leaseReqID."'" ;
        $sql_update_result = $mysqli->query($sql_update_query);
        if ($sql_update_result == FALSE)
        {
                echo "Query failed: ".$mysqli->error.$nl;
        }    
        else
        {
                    echo "Updated succesfully ! ".$nl;
        }            
        
        
        echo "Displaying results for Terminate Lease Request ID: ".$leaseReqID.$nl;

        $leaseReqID=$_GET['leaseReqID'];
        // Getting values from Table Lease_Request 
        $sql_query = "SELECT * FROM Terminate_Request WHERE RequestID='".$leaseReqID."'";


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
                        $leaseReqID= $row['RequestID'] ;

        ?>   

                    Request ID          :                <?php echo $leaseReqID ; ?><br/>    
                    Student ID          :                <?php echo $row['studentID']; ?><br/>    
                    Place ID            :                <?php echo $row['placeID']; ?><br/>    
                    Terminate Date      :                <?php echo $row['terminateDate']; ?><br/>    
                    Status              :                <?php echo $row['status']; ?><br/>    
                    Inspection Date     :                <?php echo $row['inspectionDate']; ?><br/>    


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