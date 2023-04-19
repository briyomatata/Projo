
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" href="../css/dashboard.css"> -->
    <link rel="stylesheet" href="../css/student.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" >
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <!-- Side Bar Section -->
            <h1 class ="top-header">Admin</h1>
            <ul id="Side_Menu"  class="nav nav-pills nav-stacked">
                <li class="active" > <a href="Dashboard.php"> <span class="glyphicon glyphicon-th"></span> &nbsp; Dashboard</a></li>
                <li><a href="#"> <span class="glyphicon glyphicon-user"></span> &nbsp; Students</a></li>
                <li><a href="#"> <span class="glyphicon glyphicon-list-alt"></span> &nbsp; Teachers</a></li>
                <li><a href="#"> <span class="glyphicon glyphicon-tags"></span> &nbsp; Support Staff</a></li>
                <li><a href="#"> <span class="glyphicon glyphicon-comment"></span> &nbsp; Management </a></li>
                <li><a href="#">  <span class="glyphicon glyphicon-equalizer"></span> &nbsp; Finance </a></li>
                <li><a href="#"> <span class="glyphicon glyphicon-log-out"></span> &nbsp; Logout</a></li>
            </ul>
        </div>

        <div class="col-sm-10"> 

        <?php
        require_once("add.php");


?>
      

        </div>

        
    </div>
</div>
<div id="Footer">
    <p> &copy; 2023 | All rights reserved</p>
</div>


    
</body>
</html>