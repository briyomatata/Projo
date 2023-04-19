<?php

require_once("connection.php");
require_once("sessions.php");
require_once("functions.php");


?>

<?php

if(isset($_POST["Submit"])){
    $Adm= ($_POST["Adm"]);
    $FirstName = ($_POST["fname"]);
    $MiddleName = ($_POST["mname"]);
    $LastName = ($_POST["lname"]);
    $Birth = ($_POST["Birth"]);
    $ID = ($_POST["ID"]);
    $Gender = ($_POST["Gender"]);
    $Country = ($_POST["Country"]);
    $County = ($_POST["County"]);
    $DOA = ($_POST["DOA"]);
    $Kin = ($_POST["Kin"]);
    $Relation = ($_POST["Relation"]);
    $PhoneNumber = ($_POST["Pnumber"]);

    //validation

    if(empty($Adm)){
        $_SESSION["ErrorMessage"] ="Admission Can't Be Empty";
        Redirect_to("EditStudents.php");
    }
    elseif(empty($FirstName)){
        $_SESSION["ErrorMessage"] ="FirstName Can't Be Empty";
        Redirect_to("EditStudents.php");
    }elseif(empty($MiddleName)){
        $_SESSION["ErrorMessage"] ="MiddleName Can't Be Empty";
        Redirect_to("EditStudents.php");
    }elseif(empty($LastName)){
        $_SESSION["ErrorMessage"] ="LastName Can't Be Empty";
        Redirect_to("EditStudents.php");
    }  elseif(empty($Birth)){
        $_SESSION["ErrorMessage"] ="Date of Birth Can't Be Empty";
        Redirect_to("EditStudents.php");
    }  elseif(empty($ID)){
        $_SESSION["ErrorMessage"] ="ID Can't Be Empty";
        Redirect_to("EditStudents.php");
    }  elseif(empty($Gender)){
        $_SESSION["ErrorMessage"] ="Gender Can't Be Empty";
        Redirect_to("EditStudents.php");
    }  elseif(empty($Country)){
        $_SESSION["ErrorMessage"] ="Country Can't Be Empty";
        Redirect_to("EditStudents.php");
    }  elseif(empty($County)){
        $_SESSION["ErrorMessage"] ="County Can't Be Empty";
        Redirect_to("EditStudents.php");
    }  elseif(empty($DOA)){
        $_SESSION["ErrorMessage"] ="Date of Amission Can't Be Empty";
        Redirect_to("EditStudents.php");
    }  elseif(empty($Kin)){
        $_SESSION["ErrorMessage"] ="Name of Kin Can't Be Empty";
        Redirect_to("EditStudents.php");
    }  elseif(empty($Relation)){
        $_SESSION["ErrorMessage"] ="Relation  Can't Be Empty";
        Redirect_to("EditStudents.php");
    }  elseif(empty($PhoneNumber)){
        $_SESSION["ErrorMessage"] ="PhoneNumber Can't Be Empty";
        Redirect_to("EditStudents.php");
    }else{
        global $con;
        $EditFromURL = $_GET['Edit'];
        $Query = "UPDATE  students SET  FirstName='$FirstName', MiddleName='$MiddleName',LastName='$LastName',DOB='$Dob',Identification='$ID',Gender='$Gender,Country='$Country,County-'$County,Next_of_kin='$Kin,Relation=$Rel,Number_of_guardian='$PhoneNumber,Dat_of_admission='$DOA' WHERE Admission_No = '$EditFromURL' ";
        $Execute = mysqli_query($con, $Query);

        if($Execute){
            $_SESSION["SuccessMessage"] = "Student Records Updated Successfully";
        Redirect_to("ViewS.php");
        }else{
            $_SESSION["ErrorMessage"] ="Something Went Wrong...Try Again";
            Redirect_to("EditStudents.php");
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
    <title>Edit Student Records</title>
</head>
<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                
                <div class="card">
                    <h5 class="text-center mb-5">Edit Student Records</h5>
                    <div><?php echo Message();
            echo SuccessMessage(); ?></div>

            <?php
            global $con;
            $searchQueryParameter = $_GET['Edit'];
            $EQuery = "SELECT * FROM students WHERE Admission_No = '$searchQueryParameter'";
            $ExecuteQuery = mysqli_query($con, $EQuery);
                while($DataRows = mysqli_fetch_array($ExecuteQuery)){
                    $Admupdate = $DataRows["Admission_No"];
                    $FNameupdate = $DataRows["FirstName"];
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
                }
            
            



?>
                    <form  action="EditStudents.php?Edit=<?php echo $searchQueryParameter; ?>" method="post" class="form-card">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Admission Number<span class="text-danger"> *</span></label> <input type="number" id="adm" name="Adm" placeholder="Enter the Admission Number" value = "<?php echo $Admupdate; ?>" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">First name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name" value = "<?php echo $FNameupdate; ?>"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Middle name<span class="text-danger"> *</span></label> <input type="text" id="mname" name="mname" placeholder="Enter your middile name" value = "<?php  echo $MName; ?>" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Last name<span class="text-danger"> *</span></label> <input type="text" id="lname" name="lname" placeholder="Enter your last name" value = "<?php echo $LName; ?>" > </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Date of Birth<span class="text-danger"> *</span></label> <input type="date" id="date" name="Birth" placeholder="" value = "<?php echo $Dob; ?>" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Identification<span class="text-danger"> *</span></label> <input type="number" id="id" name="ID" placeholder="" value = "<?php echo $ID; ?>" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Gender<span class="text-danger"> *</span></label> <input type="text" id="gender" name="Gender" placeholder="" value = "<?php echo $Gender; ?>" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Country<span class="text-danger"> *</span></label> <input type="text" id="Country" name="Country" placeholder="" value = "<?php echo $Country; ?>"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">County<span class="text-danger"> *</span></label> <input type="text" id="county" name="County" placeholder="" value = "<?php echo $County; ?>" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Date of Admission<span class="text-danger"> *</span></label> <input type="date" id="DOA" name="DOA" placeholder="" value = "<?php echo $DOA; ?>" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Next of Kin<span class="text-danger"> *</span></label> <input type="text" id="kin" name="Kin" placeholder="" value = "<?php echo $Kin; ?>" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Relation<span class="text-danger"> *</span></label> <input type="text" id="relation" name="Relation" placeholder="" value = "<?php echo $Rel; ?>" > </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Phone Number of Guardian<span class="text-danger"> *</span></label> <input type="phone number" id="Pnumber" name="Pnumber" placeholder="" value = "<?php echo $Mobile; ?>" > </div>
                        </div>
                        
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6"> <input class ="btn btn-success btn-lock" type="submit" name = "Submit" value ="Edit Student Records"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>