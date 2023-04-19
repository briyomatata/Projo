
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <center>
    <div class="login-form">
   

<form class="forms" action="login_check.php" method="POST">
        <div class="details">
        <p>
            <label for="inputName">UserName:</label><br>
            <input type="text" size="24" name="name" id="inputName"placeholder="Username">
        </p>

        <!-- <p>
            <label for="inputEmail">Email Address:</label><br>
            <input type="text" size="24" name="email" id="inputEmail" placeholder="Email">
        </p> -->

        <p>
            <label for="inputpassword">Password:</label><br>
            <input type="password" name="password" id="inputpassword" placeholder="password"><br> <br>
            
        </p>



        <input class="button" type="submit" name="Login" value="Login">
        </div>
    </form>
</div>
    </center>



</body>
</html>