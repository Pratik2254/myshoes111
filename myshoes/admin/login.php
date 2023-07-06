<?php
    include_once '../connection/connection.php';
    if(isset($_POST['login'])){
        $username = $_POST['admin_username'];
        $password = $_POST['admin_password'];
        $query = 'SELECT * FROM admin WHERE username = "'.$username.'" AND password = "'.$password.'"';
        $result = mysqli_query($db_con,$query);
        if($result){
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_array($result);
                session_start();
                $_SESSION['admin_id']=$row['admin_id'];
                
                header('location:admindashboard.php');
            }
            else{
                echo 'incorrect passord or username';
            }
        }
        else{
            echo 'error';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <title>Login</title>
</head>
<body>
    <div class="loginform">
    <form action="login.php" method="post">
        <input type="text" name="admin_username" id="admin_username" placeholder="Username"><br>
        <input type="password" name="admin_password" id="admin_password" placeholder="Password"><br>
        <input type="submit" name="login" value="Login">
    </form>
    </div>
</body>
</html>