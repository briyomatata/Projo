<?php


require_once("connection.php");
require_once("sessions.php");
require_once("functions.php");


if($_GET['Admission_no']){
    $Adm = $_GET['Admission_no'];
    
    $sql = "DELETE FROM students WHERE Admission_no = '$Admi'";

    $result = mysqli_query($con, $sql);

    if($result){
        header("location:student.php");
    }
}





?>