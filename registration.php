<?php
session_start();
$conn = mysqli_connect('localhost','root','','hrss');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            text-align : center;
        }

        .regform{
            margin-top: 50px;
            
        }

        .field{
            margin-top: 20px;
        }


    </style>
    <title>Registration Member Page</title>
</head>
<body>

    <h1>Registration Form</h1>
    <div class = "regform">
        <form action = "registration.php" method  ="post">
            <input class ="field" type = "text" name ="username" placeholder = "Username"><br/>
            <input class ="field" type = "password" name ="password1" placeholder = "Password"><br/>
            <input class ="field" type = "password" name ="password2" placeholder = "Re-enter Password"><br/>
            <input class ="field" type = "submit" name= "register" value="Register">
        </form>

    </div>
<?php

if (isset($_POST['register'])){
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if (empty($username) || empty($password1) || empty($password2)){
        //if there are blanks
        echo '<script type = "text/javascript">';
        echo 'alert("Please do not leave any empty blanks");';
        echo 'window.location.href = "registration.php"';
        echo '</script>';
    }

    if ($password1 == $password2){
        //password same and correct
        $sql = "INSERT INTO users (user_name,user_pass) values ('$username','$password1')";
        $result = mysqli_query($conn,$sql);

        if($result){
            //successful query
            echo '<script type = "text/javascript">';
            echo 'alert("Successful Registration! You may login now");';
            echo 'window.location.href = "login.php"';
            echo '</script>';
        }
        else{
            //error during sql query
            echo '<script type = "text/javascript">';
            echo 'alert("Please check your query");';
            echo 'window.location.href = "registration.php"';
            echo '</script>';
        }
    }

    else{
        //wrong pass
        echo '<script type = "text/javascript">';
        echo 'alert("Password does not match");';
        echo 'window.location.href = "registration.php"';
        echo '</script>';

    }


}


?>
    
</body>
</html>