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
    <title>View Students</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" >
</head>
<body>

<div class = "table-responsive">
            <table class ="table table-striped table-hover">
                <tr>
                    <th>Sr No.</th>
                    <th>Admission No</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Identification</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>County</th>
                    <th>Next of Kin</th>
                    <th>Relation</th>
                    <th>Phone Number of the Kin</th>
                    <th>Date of Admission</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>

                <?php   

                global $con;
                $ViewQuery = "SELECT * FROM students ORDER BY Admission_No desc";
                $Execute = mysqli_query($con, $ViewQuery);
                $SrNo = 0;
                while($DataRows = mysqli_fetch_array($Execute)){
                    $Adm = $DataRows["Admission_No"];
                    $FName = $DataRows["FirstName"];
                    $MName = $DataRows["MiddleName"];
                    $LName = $DataRows["LastName"];
                    $Dob = $DataRows["DOB"];
                    $ID = $DataRows["Identification"];
                    $Gender = $DataRows["Gender"];
                    $Country = $DataRows["Country"];
                    $County = $DataRows["County"];
                    $Kin = $DataRows["Next_of_kin_name"];
                    $Rel = $DataRows["Relation"];
                    $Mobile = $DataRows["Number_of_guardian"];
                    $DOA = $DataRows["Dat_of_admission"];
                    $SrNo++;
                



?>

<tr>
    <td><?php echo $SrNo; ?></td>
    <td><?php echo $Adm; ?></td>
    <td><?php echo $FName; ?></td>
    <td><?php echo $MName; ?></td>
    <td><?php echo $LName; ?></td>
    <td><?php echo $Dob; ?></td>
    <td><?php echo $ID; ?></td>
    <td><?php echo $Gender; ?></td>
    <td><?php echo $Country; ?></td>
    <td><?php echo $County; ?></td>
    <td><?php echo $Kin; ?></td>
    <td><?php echo $Rel; ?></td>
    <td><?php echo $Mobile; ?></td>
    <td><?php echo $DOA; ?></td>
    <td> <a href="../php/EditStudents.php?Edit=<?php echo $SrNo; ?>">
<span class ="btn btn-warning">Edit</span></a> </td>
    <td> <a href="../php/DeleteStudents.php?Edit=<?php echo $SrNo; ?>">
    <span class ="btn btn-danger">Delete</span> </a> </td>
    
</tr>

<?php } ?>
            </table>
        </div>
    
</body>
</html>