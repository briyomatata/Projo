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

    //valid

    // if(empty($Adm)){
    //     $_SESSION["ErrorMessage"] ="Admission Can't Be Empty";
    //     Redirect_to("student.php");
    // }
    if(empty($FirstName)){
        $_SESSION["ErrorMessage"] ="FirstName Can't Be Empty";
    Redirect_to("student.php");
    }elseif(empty($MiddleName)){
        $_SESSION["ErrorMessage"] ="MiddleName Can't Be Empty";
        Redirect_to("student.php");
    }elseif(empty($LastName)){
        $_SESSION["ErrorMessage"] ="LastName Can't Be Empty";
        Redirect_to("student.php");
    }  elseif(empty($Birth)){
        $_SESSION["ErrorMessage"] ="Date of Birth Can't Be Empty";
        Redirect_to("student.php");
    }  elseif(empty($ID)){
        $_SESSION["ErrorMessage"] ="ID Can't Be Empty";
        Redirect_to("student.php");
    }  elseif(empty($Gender)){
        $_SESSION["ErrorMessage"] ="Gender Can't Be Empty";
        Redirect_to("student.php");
    }  elseif(empty($Country)){
        $_SESSION["ErrorMessage"] ="Country Can't Be Empty";
        Redirect_to("student.php");
    }  elseif(empty($County)){
        $_SESSION["ErrorMessage"] ="County Can't Be Empty";
        Redirect_to("student.php");
    }  elseif(empty($DOA)){
        $_SESSION["ErrorMessage"] ="Date of Amission Can't Be Empty";
        Redirect_to("student.php");
    }  elseif(empty($Kin)){
        $_SESSION["ErrorMessage"] ="Name of Kin Can't Be Empty";
        Redirect_to("student.php");
    }  elseif(empty($Relation)){
        $_SESSION["ErrorMessage"] ="Relation  Can't Be Empty";
        Redirect_to("student.php");
    }  elseif(empty($PhoneNumber)){
        $_SESSION["ErrorMessage"] ="PhoneNumber Can't Be Empty";
        Redirect_to("student.php");
    }else{
        global $con;

        $Query = "INSERT INTO students(Admission_No,FirstName,MiddleName,LastName,DOB,Identification,Gender,Country,County,Next_of_kin_name,Relation, Number_of_guardian, Dat_of_admission)  VALUES ('$Adm', '$FirstName', '$MiddleName', '$LastName', '$Birth', '$ID', '$Gender', '$Country', '$County', '$Kin', '$Relation', '$PhoneNumber', '$DOA')";
        $Execute = mysqli_query($con, $Query);

        if($Execute){
            $_SESSION["SuccessMessage"] = "Student Added Successfully";
        Redirect_to("student.php");
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
    <title>Add Student</title>
</head>
<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                
                <div class="card">
                    <h5 class="text-center mb-5">Add The New Student</h5>
                    <div><?php echo Message();
            echo SuccessMessage(); ?></div>
                    <form  action="student.php" method="post" class="form-card">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Admission Number<span class="text-danger"> *</span></label> <input type="number" id="adm" name="Adm" placeholder="Enter the Admission Number" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">First name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Middle name<span class="text-danger"> *</span></label> <input type="text" id="mname" name="mname" placeholder="Enter your middile name" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Last name<span class="text-danger"> *</span></label> <input type="text" id="lname" name="lname" placeholder="Enter your last name" > </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Date of Birth<span class="text-danger"> *</span></label> <input type="date" id="date" name="Birth" placeholder="" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Identification<span class="text-danger"> *</span></label> <input type="number" id="id" name="ID" placeholder="" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Gender<span class="text-danger"> *</span></label> <input type="text" id="gender" name="Gender" placeholder="" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Country<span class="text-danger"> *</span></label> <input type="text" id="Country" name="Country" placeholder=""> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">County<span class="text-danger"> *</span></label> <input type="text" id="county" name="County" placeholder="" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Date of Admission<span class="text-danger"> *</span></label> <input type="date" id="DOA" name="DOA" placeholder="" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Next of Kin<span class="text-danger"> *</span></label> <input type="text" id="kin" name="Kin" placeholder="" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Relation<span class="text-danger"> *</span></label> <input type="text" id="relation" name="Relation" placeholder="" > </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Phone Number of Guardian<span class="text-danger"> *</span></label> <input type="phone number" id="Pnumber" name="Pnumber" placeholder="" > </div>
                        </div>
                        
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6"> <input class ="btn btn-success btn-lock" type="submit" name = "Submit" value ="Add New student"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>