<html>

<?php

	//include "header.php";
?>    
    
<div id='LeaseRquests'>
<?php 
    
include "database.php";


$mysqli = connect_db();
$nl ="<br /><br />";	
$querySuccessString="Query executed succesfully ! ";



// Getting values from Table Lease_Request 
$sql_query_lease_req = "SELECT * FROM Lease_Request";

$result_lease_req = $mysqli->query($sql_query_lease_req);
//$result = mysql_query($sql_query);
$count = 0 ;

if ($result_lease_req == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $querySuccessString.$nl;
            
            //$row = mysqli_fetch_assoc($result);
            while($row = mysqli_fetch_assoc($result_lease_req)) {
                $count++; 
                //echo "PeopleID: ".$row['PeopleID'];   
                $leaseReqID= $row['LeaseRequestID'];
                $count = (String)$count ; 
                $leasreqTxt = "Lease Request # ".$count ;
                echo"<b><A HREF='./lease_req_details.php?leaseReqID=$leaseReqID'>$leasreqTxt</A><p></b>";									
            }

            
}

?>

</div>    
    
    
<div id='TerminatedLeaseRquests'>
<br />
<strong>Terminated Lease Requests</strong>    
<br />
    
<?php    
    
$sql_query_term_lease_req = "SELECT * FROM Terminate_Request";

$result_term_lease_req = $mysqli->query($sql_query_term_lease_req);
//$result = mysql_query($sql_query);
$count = 0 ;

if ($result_term_lease_req == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $querySuccessString.$nl;
            
            //$row = mysqli_fetch_assoc($result);
            while($row = mysqli_fetch_assoc($result_term_lease_req)) {
                $count++; 
                //echo "PeopleID: ".$row['PeopleID'];   
                $leaseReqID= $row['RequestID'];
                $count = (String)$count ; 
                $leasreqTxt = "Terminate Request # ".$count ;
                echo"<b><A HREF='./terminate_lease_req_details.php?leaseReqID=$leaseReqID'>$leasreqTxt</A><p></b>";									
            }

            
}


?>
</div>    
    

<br />
<strong>Maintenance Tickets</strong>    
<br />
<div id='criticalTickets'>    
<strong>Critical Tickets</strong>
<br />
<?php    
    
$sql_query_ticket = " SELECT * FROM Maintenance_Ticket WHERE ticketSeverity='critical' ";

$result_ticket = $mysqli->query($sql_query_ticket);
//$result = mysql_query($sql_query);
$count = 0 ;

if ($result_ticket == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $querySuccessString.$nl;
            
            //$row = mysqli_fetch_assoc($result);
            while($row = mysqli_fetch_assoc($result_ticket)) {
                $count++; 
                //echo "PeopleID: ".$row['PeopleID'];   
                $ticketID= $row['ticketID'];
                $count = (String)$count ; 
                $ticketTxt = "Critical Ticket # ".$count ;
                echo"<b><A HREF='./ticket_details.php?ticketID=$ticketID'>$ticketTxt</A><p></b>";									
            }

            
}


?>    
</div>
    
<div id='normalTickets'>    
<strong>Normal Tickets</strong>
<br />
<?php    
    
$sql_query_ticket = " SELECT * FROM Maintenance_Ticket WHERE ticketSeverity='normal' ";

$result_ticket = $mysqli->query($sql_query_ticket);
//$result = mysql_query($sql_query);
$count = 0 ;

if ($result_ticket == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $querySuccessString.$nl;
            
            //$row = mysqli_fetch_assoc($result);
            while($row = mysqli_fetch_assoc($result_ticket)) {
                $count++; 
                //echo "PeopleID: ".$row['PeopleID'];   
                $ticketID= $row['ticketID'];
                $count = (String)$count ; 
                $ticketTxt = "Normal Ticket # ".$count ;
                echo"<b><A HREF='./ticket_details.php?ticketID=$ticketID'>$ticketTxt</A><p></b>";									
            }

            
}


?>    
</div>  
<div id='ParkingPermit'>
<strong>Parking Permit Requests</strong>
<br />
<?php    
    
$sql_query_parking = " SELECT * FROM Parking_Requests";

$result_parking = $mysqli->query($sql_query_parking);
//$result = mysql_query($sql_query);
$count = 0 ;

if ($result_parking == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $querySuccessString.$nl;
            
            //$row = mysqli_fetch_assoc($result);
            while($row = mysqli_fetch_assoc($result_parking)) {
                $count++; 
                //echo "PeopleID: ".$row['PeopleID'];   
                $requestID= $row['requestID'];
                $count = (String)$count ; 
                $reqTxt = "Request ID # ".$count ;
                echo"<b><A HREF='./parking_permit_details.php?requestID=$requestID'>$reqTxt</A><p></b>";									
            }

            
}


?>        
</div>    
</<html>    