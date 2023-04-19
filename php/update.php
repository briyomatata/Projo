<?php


require_once("connection.php");
require_once("sessions.php");
require_once("functions.php");


if($_GET['Edit']){
    $Admission = $_GET['Edit'];
    
    $Query = "UPDATE  students SET  FirstName='$FirstName', MiddleName='$MiddleName',LastName='$LastName',DOB='$Dob',Identification='$ID',Gender='$Gender,Country='$Country,County-'$County,Next_of_kin='$Kin,Relation=$Rel,Number_of_guardian='$PhoneNumber,Dat_of_admission='$DOA' WHERE Admission_No = '$Admission' ";

    $result = mysqli_query($con, $Query);

    if($result){
        header("location:ViewS.php");
    }
}





?>