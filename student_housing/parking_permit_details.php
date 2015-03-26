<html>


<?php 
    
include "database.php";


$mysqli = connect_db();
$nl ="<br /><br />";	
$querySuccessString="Query executed succesfully ! ";
$reqID="" ;



$reqID=$_GET['requestID'];
// Getting values from Table Lease_Request 
$sql_query = "SELECT * FROM Parking_Requests WHERE requestID='".$reqID."'";


echo "Displaying results for Parking Requests : ".$reqID.$nl;



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
                $reqID= $row['requestID'] ;
                
?>   
    
            Request ID          :                <?php echo $reqID ; ?><br/>    
			Student ID          :                <?php echo $row['studentID']; ?><br/>    
			Lot No              :                <?php echo $row['lotno']; ?><br/>    
            Spot No             :                <?php echo $row['spotno']; ?><br/>    
    
    
<?php                
                
            }

            
}

?>
<br />
<div id='updateForm'>
<strong> Want to update status?</strong> <br />
<form action='parking_permit_details.php?requestID=<?php echo $reqID; ?>' method='POST' name='req_update' >
Enter Status: <input type='text' name='statusTextBox' id='statusTextBox'></input>

<br />    
<input type='submit' value='Enter'>
</form>
<br />    
</div>  

<?php 

    $status = null ;

    if(isset($_POST['statusTextBox']))
    {
        $status = $_POST['statusTextBox'];    
    }


    /*
    if($status != null )
    {
        

        
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
        
    
        $reqID=$_GET['requestID'];
        // Getting values from Table Lease_Request 
        $sql_query = "SELECT * FROM Parking_Requests WHERE requestID='".$reqID."'";


        echo "Displaying results for Parking Requests : ".$reqID.$nl;



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
                        $reqID= $row['requestID'] ;

        ?>   

                    Request ID          :                <?php echo $reqID ; ?><br/>    
                    Student ID          :                <?php echo $row['studentID']; ?><br/>    
                    Lot No              :                <?php echo $row['lotno']; ?><br/>    
                    Spot No             :                <?php echo $row['spotno']; ?><br/>    


        <?php                

                    }


        }
    }
    */

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