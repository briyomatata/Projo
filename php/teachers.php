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

    if(empty($FirstName)){
        $_SESSION["ErrorMessage"] ="FirstName Can't Be Empty";
    Redirect_to("teachers.php");
    }elseif(empty($MiddleName)){
        $_SESSION["ErrorMessage"] ="MiddleName Can't Be Empty";
        Redirect_to("teachers.php");
    }elseif(empty($LastName)){
        $_SESSION["ErrorMessage"] ="LastName Can't Be Empty";
        Redirect_to("teachers.php");
    }  elseif(empty($ID)){
        $_SESSION["ErrorMessage"] ="ID Can't Be Empty";
        Redirect_to("teachers.php");
    }  elseif(empty($Gender)){
        $_SESSION["ErrorMessage"] ="Gender Can't Be Empty";
        Redirect_to("teachers.php");
    }
    elseif(empty($PhoneNumber)){
        $_SESSION["ErrorMessage"] ="PhoneNumber Can't Be Empty";
        Redirect_to("teachers.php");
    }  elseif(empty($Designation)){
        $_SESSION["ErrorMessage"] ="Designation Can't Be Empty";
        Redirect_to("teachers.php");
    }else{
        global $con;

        $Query = "INSERT INTO teachers(Staff_id,FirstName,MiddleName,LastName,ID_number,Gender,Phone_number,Designation)  VALUES ('$StaffID', '$FirstName', '$MiddleName', '$LastName','$ID', '$Gender', '$PhoneNumber', '$Designation')";
        $Execute = mysqli_query($con, $Query);

        if($Execute){
            $_SESSION["SuccessMessage"] = "Teacher Added Successfully";
        Redirect_to("teachers.php");
        }else{
            $_SESSION["ErrorMessage"] ="Something Went Wrong...Try Again";
            Redirect_to("teachers.php");
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
                    <h5 class="text-center mb-5">Add A New Teacher</h5>
                    <div><?php echo Message();
            echo SuccessMessage(); ?></div>
                    <form class="form-card" action="teachers.php" method="post">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Staff Id<span class="text-danger"> *</span></label> <input type="number" id="adm" name="staffID" placeholder="Enter the Staff ID" onblur="validate(2)"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">First name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name" onblur="validate(1)"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Middle name<span class="text-danger"> *</span></label> <input type="text" id="mname" name="mname" placeholder="Enter your middile name" onblur="validate(2)"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Last name<span class="text-danger"> *</span></label> <input type="text" id="lname" name="lname" placeholder="Enter your last name" onblur="validate(2)"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">ID Number<span class="text-danger"> *</span></label> <input type="number" id="ID" name="ID_number" placeholder="" onblur="validate(3)"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Gender<span class="text-danger"> *</span></label> <input type="text" id="gender" name="Gender" placeholder="" onblur="validate(4)"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Phone Number<span class="text-danger"> *</span></label> <input type="number" id="Pnumber" name="Pnumber" placeholder="" onblur="validate(4)"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Designation<span class="text-danger"> *</span></label> <input type="text" id="Deg" name="Deg" placeholder="" onblur="validate(4)"> </div>
                        </div>

                        <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <input class ="btn btn-success btn-lock" type="submit" name = "Submit" value ="Add New Teacher"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>