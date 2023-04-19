<?php


require_once("connection.php");
require_once("sessions.php");
require_once("functions.php");


if($_GET['Delete']){
    $Admission = $_GET['Delete'];
    
    $sql = "DELETE FROM students WHERE Admission_No = '$Admission'";

    $result = mysqli_query($con, $sql);

    if($result){
        header("location:ViewS.php");
    }
}





?>