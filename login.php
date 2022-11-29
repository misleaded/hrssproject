
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
            text-align:center;
        }

        .field{
            margin-bottom : 20px;
        }

    </style>
    <title>Login</title>
</head>
<body>


    <h2>User Loginsss</h2>

    <div>
        <form action = "login.php" method  ="post">
            <input class ="field" type = "text" name ="username" placeholder = "Username"><br/>
            <input class ="field" type = "password" name ="password" placeholder = "Password"><br/>
            <input class ="field" type = "submit" name= "login" value="Login">
        </form>

    </div>

<?php

if (isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE user_name = '$username' AND user_pass = '$password'";

$select = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($select);




if(is_array($row)){

    $_SESSION['username'] = $row['user_name'];

 }

  else{
      echo '<script type = "text/javascript">';
      echo 'alert("Invalid Username or Password");';
      echo 'window.location.href = "login.php"';
      echo '</script>';
  }
}

  if(isset($_SESSION['username'])){
      header("Location:index.php");
  }

?>
    
</body>
</html>