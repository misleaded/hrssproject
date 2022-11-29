<?php
session_start();

$conn = mysqli_connect('localhost','root','','hrss');

$currentuser = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        .form-box{
            margin-top: 10px;
            width: 340px;
        }

        .form-group{
            margin-top: 20px;
          

        }



        .form-input-control{
            display: inline-block;
            width: 200px;
        }

        label{
            display: inline-block;
            width : 120px;
        }


    </style>
    
    <title>Update Current Password</title>
</head>
<body>
    <h1><a href = "index.php">Home</a></h1>
    <h2>Update Current Password</h2>
    <div class = "form-box">
        <form action ="changepass.php" method = "post">
            <div class = "form-group">
                <label for= "username">Username</label>
                <input class = "form-input-control" type = "text" name = "username" value ="<?php echo $currentuser;?>" disabled/><br>
            </div>  
            <div class = "form-group">  
                <label for= "currentpass">Current Password</label>
                <input class = "form-input-control" type = "password" name = "currentpassword" placeholder="Current Password" /><br>
            </div>
            <div class = "form-group">
                <label for= "newpass1">New Password</label>
                <input class = "form-input-control" type = "password" name = "newpassword" placeholder="New Password"/><br>
            </div>
            <input style = "float:right" type = "submit" name = "updatepass" value = "Update Password">
           
        </form>
        </div>
    </div>

</body>
</html>

<?php

if (isset($_POST['updatepass'])){

    $currentpass = $_POST['currentpassword'];
    $newpass1 = $_POST['newpassword'];


    if (empty($currentpass) || empty($newpass1)){
        echo '<script type= "text/javascript">';
        echo 'alert("Please do not leave empty blanks");';
        echo 'window.location.href = "changepass.php"';
        echo '</script>';
    }

    //retrieve from db
    $sql = "SELECT * from users WHERE user_name = '$currentuser'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    if(is_array($row)){
        //data successfully fetched from using query
        $passfromdb = $row['user_pass'];

        //compare passfrom db with pass with entered pass
        if ($currentpass == $passfromdb){
            //correct password
            $updatestatement = "UPDATE users SET user_pass = '$newpass1' WHERE user_name = '$currentuser'";
            $updateresult = mysqli_query($conn,$updatestatement);

            if($updateresult){
                echo '<script type="text/javascript">';
                echo 'alert("Password Updated Successfully");';
                echo 'window.location.href = "index.php"';
                echo '</script>';
            }else{
                echo "Error updating record: " . mysqli_error($conn);
            }





        }else{
            echo '<script type="text/javascript">';
            echo 'alert("Wrong Current Password. Please Try Again");';
            echo 'window.location.href = "changepass.php"';
            echo '</script>';
        }


    }else{
        echo '<script type= "text/javascript">';
        echo 'alert("Please check query");';
        echo 'window.location.href = "changepass.php"';
        echo '</script>';
    }



}

?>