<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "school management system";


//creating database connection
$con = mysqli_connect($host, $username, $password, $database);

//checking the connection
if(!$con){
    die("Connection Failed: ". mysqli_connect_error());
}
// else{
//     echo "Connection Successfull";
// }

?>