<?php

require_once("connection.php");
require_once("sessions.php");
require_once("functions.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Teachers</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" >
</head>
<body>

<div class = "table-responsive">
            <table class ="table table-striped table-hover">
                <tr>
                    <th>Sr No.</th>
                    <th>Staff Id</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Identification</th>
                    <th>Gender</th>
                    <th>Phone Number of the Teacher</th>
                    <th>Designation</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>

                <?php   

                global $con;
                $ViewQuery = "SELECT * FROM teachers ORDER BY Staff_id desc";
                $Execute = mysqli_query($con, $ViewQuery);
                $SrNo = 0;
                while($DataRows = mysqli_fetch_array($Execute)){
                    $Staff_id = $DataRows["Staff_id"];
                    $FName = $DataRows["FirstName"];
                    $MName = $DataRows["MiddleName"];
                    $LName = $DataRows["LastName"];
                    $ID = $DataRows["ID_number"];
                    $Gender = $DataRows["Gender"];
                    $Mobile = $DataRows["Phone_number"];
                    $Deg = $DataRows["Designation"];
                    $SrNo++;
                



?>

<tr>
    <td><?php echo $SrNo; ?></td>
    <td><?php echo $Staff_id; ?></td>
    <td><?php echo $FName; ?></td>
    <td><?php echo $MName; ?></td>
    <td><?php echo $LName; ?></td>
    <td><?php echo $ID; ?></td>
    <td><?php echo $Gender; ?></td>
    <td><?php echo $Mobile; ?></td>
    <td><?php echo $Deg; ?></td>
    <td> <a href="../php/EditStudents.php?Edit=<?php echo $SrNo; ?>">
<span class ="btn btn-warning">Edit</span></a> </td>
    <td> <a href="../php/DeleteStudents.php?Edit=<?php echo $SrNo; ?>">
    <span class ="btn btn-danger">Delete</span> </a> </td>
</tr>

<?php } ?>
    
</body>
</html>