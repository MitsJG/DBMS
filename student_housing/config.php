<html>


<?php 
    
include "database.php";

$mysqli = connect_db();
$nl ="<br /><br />";	
$insertSuccessString="Query executed ! Table created for ";
$alterSuccessString="Query executed ! Table altered for ";

/*


// Table Address started
$sql_query = "CREATE TABLE Address(addrID varchar(20) NOT NULL, street varchar(50), city varchar(50), zipcode int, CONSTRAINT address_pk PRIMARY KEY (addrID)); ";
$tableName="Address";



$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}
    
// Table Address completed

// Table Parking_Permit started
$sql_query = "CREATE TABLE Parking_Permit(permitID varchar(20) NOT NULL, peopleID varchar(20) NOT NULL, parkingRent int);";
$tableName="Parking_Permit";



$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}


$sql_query = "ALTER TABLE Parking_Permit ADD CONSTRAINT parking_permit_pk PRIMARY KEY(permitID);";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $alterSuccessString.$tableName.$nl;
}




// Table Parking_Permit completed

// Table Univ_People started
$sql_query = "CREATE TABLE Univ_People(peopleID varchar(20), currentStatus varchar(20), category varchar(20), dateOfBirth date, available TINYINT(1), sex char(10), program varchar(20), specialNeeds varchar(100), nationality varchar(20), courseName varchar(50), phone int, alternatePhone int, firstName varchar(20), lastName varchar(20), additionalComments varchar(20), addressID varchar(20), housingID varchar(20), leaseID varchar(20), permitID varchar(20), CONSTRAINT univ_people_pk PRIMARY KEY(peopleID), CONSTRAINT univ_people_address_fk FOREIGN KEY(addressID) REFERENCES Address(addrID), CONSTRAINT univ_people_permit_fk FOREIGN KEY(permitID) REFERENCES Parking_Permit(permitID));";
$tableName="Univ_People";



$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
   		echo $insertSuccessString.$tableName.$nl;
}

$sql_query = "ALTER TABLE Parking_Permit ADD Constraint Parking_Permit_People FOREIGN KEY(peopleID) REFERENCES Univ_People(peopleID);";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $alterSuccessString.$tableName.$nl;
}



// Table Univ_People completed    
 
 

// Table Guest started
$sql_query = "CREATE TABLE Guest(approvalID varchar(20), CONSTRAINT guest_pk PRIMARY KEY(approvalID), CONSTRAINT guest_fk FOREIGN KEY(approvalID) REFERENCES Univ_People(peopleID));";
$result = $mysqli->query($sql_query);
$tableName="Guest";
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
   		echo $insertSuccessString.$tableName.$nl;
}
    
// Table Guest completed
 


// Table Student started
$sql_query = "CREATE TABLE Student(studentID varchar(20), category varchar(20), CONSTRAINT student_pk PRIMARY KEY(studentID), CONSTRAINT student_fk FOREIGN KEY(studentID) REFERENCES Univ_People(peopleID));";

$tableName="Student";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}
    
// Table Student completed
 

// Table Family started
$tableName="Family";
$sql_query = "CREATE TABLE Family(name varchar(50), studentID varchar(20), dateOfBirth date, CONSTRAINT family_pk PRIMARY KEY(name, studentID), CONSTRAINT family_fk FOREIGN KEY(studentID) REFERENCES Student(studentID));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}
    
// Table Family completed


// Table Kin started
$tableName="Kin";
$sql_query = "CREATE TABLE Kin(studentID varchar(20), name varchar(50), relationship varchar(20), telephone int, addressID varchar(20), CONSTRAINT kin_pk PRIMARY KEY(studentID, name), CONSTRAINT kin_student_fk FOREIGN KEY(studentID) REFERENCES Student(studentID), CONSTRAINT kin_address_fk FOREIGN KEY(addressID) REFERENCES Address(addrID));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}
    
// Table Kin completed



// Table Guest_Request started
$tableName="Guest_Request";
$sql_query = "CREATE TABLE Guest_Request( guestrequestID varchar(20), status varchar(10) CHECK (status IN ('pending','approved')), CONSTRAINT guestrequest_pk PRIMARY KEY(guestrequestID) );";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}
    
// Table Guest_Request completed



// Table Housing_Staff started
$tableName="Housing_Staff";
$sql_query = "CREATE TABLE Housing_Staff(staffID varchar(20), firstName varchar(50), lastName varchar(50), dateOfBirth date, sex char(10), position varchar(30), location varchar(20), addressID varchar(20), CONSTRAINT housing_staff_pk PRIMARY KEY(staffID), CONSTRAINT housing_staff_address_fk FOREIGN KEY(addressID) REFERENCES Address(addrID));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}
    
// Table Housing_Staff completed




// Table Housing started
$tableName="Housing";
$sql_query = "CREATE TABLE Housing(houseID varchar(20), addressID varchar(20), name varchar(50), telephone int, available int(1), CONSTRAINT housing_pk PRIMARY KEY(houseID), CONSTRAINT housing_fk FOREIGN KEY(addressID) REFERENCES Address(addrID));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}
    
// Table Housing completed





// Table Residence_Hall started
$tableName="Residence_Hall";
$sql_query = "CREATE TABLE Residence_Hall( hallID varchar(20), name varchar(20), addrID varchar(20) NOT NULL, telephoneNo int, hallManager varchar(20) NOT NULL, eligibility int CHECK ( eligibility IN (1,2,3) ), CONSTRAINT residence_pk PRIMARY KEY(hallID), CONSTRAINT residence_fk FOREIGN KEY(hallID) references Housing(houseID), CONSTRAINT residence_fk2 FOREIGN KEY(addrID) references Address(addrID) );";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}
  
  
// Table Residence_Hall completed


// Table Apartment started
$tableName="Apartment";

$sql_query = "CREATE TABLE Apartment( apartmentID varchar(20), addrID varchar(20) NOT NULL, noStud int, noBed int, noBath int, family varchar(5), CONSTRAINT apartment_pk PRIMARY KEY(apartmentID), CONSTRAINT apartment_fk FOREIGN KEY(addrID) references Address(addrID) );";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}

$sql_query = "ALTER TABLE Apartment ADD Constraint familyValues CHECK ( family IN ('yes', 'no'));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $alterSuccessString.$tableName.$nl;
}

// Table Apartment completed



// Table Places started
$tableName="Places";

$sql_query = "CREATE TABLE Places( placeID varchar(20), houseID varchar(20), monthlyRent int NOT NULL, roomNo int, studentID varchar(20), occupied varchar(10));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}

$sql_query = "ALTER TABLE Places ADD Constraint places_check CHECK ( occupied IN ('Yes', 'No'));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $alterSuccessString.$tableName.$nl;
}

$sql_query = "ALTER TABLE Places ADD Constraint places_fk FOREIGN KEY(houseID) REFERENCES Housing(houseID);";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $alterSuccessString.$tableName.$nl;
}

$sql_query = "ALTER TABLE Places ADD Constraint places_fk2 FOREIGN KEY(studentID) REFERENCES Student(studentID);";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $alterSuccessString.$tableName.$nl;
}

$sql_query = "ALTER TABLE Places ADD Constraint Place_PK Primary KEY(placeID);";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $alterSuccessString.$tableName.$nl;
}


// Table Places completed


  


// Table Private_Accomodation started
$tableName="Private_Accomodation";

$sql_query = "CREATE TABLE Private_Accommodation( studentID varchar(20), address varchar(20), CONSTRAINT pvtacco_pk PRIMARY KEY(studentID), CONSTRAINT pvtacco_fk FOREIGN KEY(studentID) references Student(studentID) );";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}


//Table  Private_Accomodation ended 



// Table Lease_Request started
$tableName="Lease_Request";

$sql_query = "CREATE TABLE Lease_Request(LeaseRequestID varchar(20) NOT NULL, PeopleID varchar(20), PlaceID varchar(20), status varchar(10), startDate Date, rentalPeriod int, preference1 varchar(20), preference2 varchar(20), preference3 varchar(20), paymentMode varchar(10), CONSTRAINT lease_request_pk PRIMARY KEY(LeaseRequestID), CONSTRAINT lease_request_fk FOREIGN KEY(PeopleID) REFERENCES  Univ_People(peopleID));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}


//Table  Lease_Request ended 



// Table Lease started
$tableName="Lease";

$sql_query = "CREATE TABLE Lease(studentID varchar(20), placeID varchar(20), leaseID varchar(20), leaseDuration int, entrydate date, exitDate date, securityDeposit int, penalty int, cutOffDate date, CONSTRAINT Lease_pk PRIMARY KEY(leaseID), CONSTRAINT Lease_fk1 FOREIGN KEY(studentID) REFERENCES Student(studentID));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}

$sql_query = "ALTER TABLE Lease ADD Constraint Lease_fk2 FOREIGN KEY(placeID) REFERENCES Places(placeID);";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $alterSuccessString.$tableName.$nl;
}

//Table  Lease ended 




// Table Terminate_Request started
$tableName="Terminate_Request";

$sql_query = "CREATE TABLE Terminate_Request(RequestID varchar(20), studentID varchar(20), placeID varchar(20), terminateDate Date, status varchar(10), inspectionDate Date, CONSTRAINT Terminate_Request_pk PRIMARY KEY (RequestID), CONSTRAINT Terminate_Request_fk1 FOREIGN KEY (studentID) REFERENCES Student(studentID) ,CONSTRAINT Terminate_Request_fk2 FOREIGN KEY (placeID) REFERENCES Places(placeID));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}

//Table Terminate_Request ended 



// Table Request started
$tableName="Request";

$sql_query = "CREATE TABLE Request ( studentID varchar(20), LeaserequestID varchar(20), request_Type varchar(20), CONSTRAINT Request_pk PRIMARY KEY (studentID, LeaserequestID),CONSTRAINT Request_fk1 FOREIGN KEY (studentID) REFERENCES Student(studentID), CONSTRAINT Request_fk2 FOREIGN KEY (LeaserequestID) REFERENCES Lease_Request(LeaserequestID));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}

$sql_query = "ALTER TABLE Request ADD Constraint request_Typevalues CHECK ( request_type IN ('Processed', 'Pending', 'In_Progress')); ";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $alterSuccessString.$tableName.$nl;
}

//Table Request ended 




// Table Parking_Lot started
$tableName="Parking_Lot";

$sql_query = "CREATE TABLE Parking_Lot(lotno varchar(10), PRIMARY KEY(lotno));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}

//Table Parking_Lot ended 



// Table Has_Options started
$tableName="Has_Options";

$sql_query = "CREATE TABLE Has_Options( lotno varchar(10), housingID varchar(20), location varchar (20), PRIMARY KEY(lotNo,housingID), CONSTRAINT has_Option_fk1 FOREIGN KEY(lotno) REFERENCES parking_lot(lotno), CONSTRAINT has_Option_fk2 FOREIGN KEY(housingID) REFERENCES Housing(houseID));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}

//Table Has_Options ended 




 
// Table Parking_Spot started
$tableName="Parking_Spot";

$sql_query = "CREATE TABLE Parking_Spot(spotID varchar(20), lotID varchar(10), classification varchar(20), availability int, address varchar(50), PRIMARY KEY (spotID), CONSTRAINT parking_spot_fk1 FOREIGN KEY(lotID) REFERENCES Parking_Lot(lotno), CHECK(classification IN ('Handicapped','Small Car','Large Car','Bike')));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}

//Table Parking_Spot ended 





// Table Parking_Requests started
$tableName="Parking_Requests";

$sql_query = "CREATE TABLE Parking_Requests( requestID int, lotno varchar(20), spotno varchar(20), studentID varchar(20), PRIMARY KEY (requestID), CONSTRAINT parking_request_fk1 FOREIGN KEY(lotNo) REFERENCES Parking_Lot(lotno), CONSTRAINT parking_request_fk2 FOREIGN KEY(spotno) REFERENCES Parking_Spot(spotID), CONSTRAINT parking_request_fk3 FOREIGN KEY(studentID) REFERENCES Student(studentID));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}

//Table Parking_Requests ended 





// Table Nearby started
$tableName="Nearby";

$sql_query = "CREATE TABLE Nearby(studentID varchar(20), lotID varchar(20), nearBy int, CONSTRAINT nearby_fk1 FOREIGN KEY(studentID) REFERENCES Student(studentID), CONSTRAINT nearby_fk2 FOREIGN KEY(lotID) REFERENCES Parking_Lot(lotno));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}

//Table Nearby ended 




// Table Maintenance_Ticket started
$tableName="Maintenance_Ticket";

$sql_query = "CREATE TABLE Maintenance_Ticket( ticketID int, approvalStatus varchar(20), inspectionDate date, damageCharges int, ticketStatus varchar(20), ticketSeverity varchar(10), ticketType varchar(20), studentID varchar(20), staffID varchar(20), houseID varchar(20), CONSTRAINT maintenanceTicket_pk PRIMARY KEY(ticketID), CONSTRAINT maintenanceTicket_fk FOREIGN KEY(studentID) references Student(studentID), CONSTRAINT maintenanceTicket_fk2 FOREIGN KEY(houseID) references Housing(houseID),  CONSTRAINT maintenanceTicket_fk3 FOREIGN KEY(staffID) references Housing_Staff(staffID));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}



// Table LogIn started
$tableName="Login";

$sql_query = "CREATE TABLE Login(ID varchar(10), password varchar(10));";
$result = $mysqli->query($sql_query);
if ($result == FALSE)
{
		echo "Query failed: ".$mysqli->error.$nl;
}    
else
{
    		echo $insertSuccessString.$tableName.$nl;
}

*/

?>
    


</html>
