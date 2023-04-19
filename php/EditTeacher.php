<?php

require_once("connection.php");
require_once("sessions.php");
require_once("functions.php");


?>

<?php
if(isset($_POST["Submit"])){
    $StaffID= ($_POST["staffID"]);
    $FirstName = ($_POST["fname"]);
    $MiddleName = ($_POST["mname"]);
    $LastName = ($_POST["lname"]);
    $ID = ($_POST["ID_number"]);
    $Gender = ($_POST["Gender"]);
    $PhoneNumber = ($_POST["Pnumber"]);
    $Designation = ($_POST["Deg"]);


    //validation

    if(empty($StaffID)){
        $_SESSION["ErrorMessage"] ="FirstName Can't Be Empty";
    Redirect_to("EditTeacher.php");
}elseif(empty($FirstName)){
    $_SESSION["ErrorMessage"] ="MiddleName Can't Be Empty";
    Redirect_to("EditTeacher.php");
    }elseif(empty($MiddleName)){
        $_SESSION["ErrorMessage"] ="MiddleName Can't Be Empty";
        Redirect_to("EditTeacher.php");
    }elseif(empty($LastName)){
        $_SESSION["ErrorMessage"] ="LastName Can't Be Empty";
        Redirect_to("EditTeacher.php");
    }  elseif(empty($ID)){
        $_SESSION["ErrorMessage"] ="ID Can't Be Empty";
        Redirect_to("EditTeacher.php");
    }  elseif(empty($Gender)){
        $_SESSION["ErrorMessage"] ="Gender Can't Be Empty";
        Redirect_to("EditTeacher.php");
    }
    elseif(empty($PhoneNumber)){
        $_SESSION["ErrorMessage"] ="PhoneNumber Can't Be Empty";
        Redirect_to("EditTeacher.php");
    }  elseif(empty($Designation)){
        $_SESSION["ErrorMessage"] ="Designation Can't Be Empty";
        Redirect_to("EditTeacher.php");
    }else{
        global $con;
        $EditFromUrl = $_GET['Edit'];

        $Query = "UPDATE  teachers SET Staff_id='$Adm', FirstName='$FirstName', MiddleName='$MiddleName',LastName='$LastName',ID_number='$ID',Phone_number='$PhoneNumber,Designation='$Designation' WHERE Staff_id = '$EditFromUrl' ";
        $Execute = mysqli_query($con, $Query);

        if($Execute){
            $_SESSION["SuccessMessage"] = "Records Updated Successfully";
        Redirect_to("Teacher-dash.php");
        }else{
            $_SESSION["ErrorMessage"] ="Something Went Wrong...Try Again";
            Redirect_to("student.php");
        }
    }
}


  




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/student.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <title>Add teachers</title>
</head>
<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                
                <div class="card">
                    <h5 class="text-center mb-5">Edit Teacher Record</h5>
                    <div><?php echo Message();
            echo SuccessMessage(); ?></div>


<?php
 global $con;
 $searchQueryParameter = $_GET['Edit'];
 $EQuery = "SELECT * FROM teachers WHERE Staff_id = '$searchQueryParameter'";
 $ExecuteQuery = mysqli_query($con, $EQuery);
 if(!$ExecuteQuery){
     echo mysqli_connect_error($con);
 }
 else{
     while($DataRows = mysqli_fetch_array($ExecuteQuery)){
         $StaffID = $DataRows["Staff_id"];
         $FName = $DataRows["FirstName"];
         $MName = $DataRows["MiddleName"];
         $LName = $DataRows["LastName"];
         $ID = $DataRows["ID_number"];
         $Gender = $DataRows["Gender"];
         $Mobile = $DataRows["Phone_number"];
         $Designation = $DataRows["Designation"];
     }
 }



?>





                    <form class="form-card" action="teachers.php" method="post">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Staff Id<span class="text-danger"> *</span></label> <input type="number" id="adm" name="staffID" placeholder="Enter the Staff ID" value = "<?php echo $StaffID; ?>"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">First name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name" value = "<?php echo $FName; ?>"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Middle name<span class="text-danger"> *</span></label> <input type="text" id="mname" name="mname" placeholder="Enter your middile name" value = "<?php echo $MName; ?>"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Last name<span class="text-danger"> *</span></label> <input type="text" id="lname" name="lname" placeholder="Enter your last name" value = "<?php echo $LName; ?>"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">ID Number<span class="text-danger"> *</span></label> <input type="number" id="ID" name="ID_number" placeholder="" value = "<?php echo $ID; ?>"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Gender<span class="text-danger"> *</span></label> <input type="text" id="gender" name="Gender" placeholder="" value = "<?php echo $Gender; ?>"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Phone Number<span class="text-danger"> *</span></label> <input type="number" id="Pnumber" name="Pnumber" placeholder="" value = "<?php echo $Mobile; ?>"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Designation<span class="text-danger"> *</span></label> <input type="text" id="Deg" name="Deg" placeholder="" value = "<?php echo $Designation; ?>"> </div>
                        </div>

                        <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <input class ="btn btn-success btn-lock" type="submit" name = "Submit" value ="Edit Teacher's Record"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>