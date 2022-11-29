<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>


    </style>
    
    <title>Homepage</title>
</head>


<body>
    <h1><a href = "index.php">Home</a></h1>
    <h2>Welcome, <?php echo $_SESSION['username'];?></h2>

    <h2><button><a href="roombooking.php">Book a Room Now</a></button></h2>
    <button style ="margin-top: 30px"><a href ="changepass.php">Change Password</a></button><br>

    Click here to <a href = "logout.php">Logout</a><br>



    
</body>
</html>