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
if(isset($_POST["submit"])){}

$name = $_POST['name'];
$password = $_POST['password'];

$Query = "SELECT * from users where username ='".$name."' AND password ='".$password."'";
$result = mysqli_query($con, $Query);

$row = mysqli_fetch_array($result);

if($row["usertype"] == "student"){
    $_SESSION['username'] = $name;
    $_SESSION['usertype'] = "student";
    header("location:Student-dash.php");


} elseif($row["usertype"] == "teacher"){
    $_SESSION['username'] = $name;
    $_SESSION['usertype'] = "teacher";
    header("location:Teacher-dash.php");
}

elseif($row["usertype"] == "admin"){
    $_SESSION['username'] = $name;
    $_SESSION['usertype'] = "admin";
    header("location:admin.php");
}

elseif($row["usertype"] == "Staff"){
    $_SESSION['username'] = $name;
    $_SESSION['usertype'] = "Staff";
    header("location:Staff-dash.php");
}

else{

    $message = "Invalid username or password";
    $_SESSION['loginMessage'] = $message;

    header("location:login.php");
}


?>