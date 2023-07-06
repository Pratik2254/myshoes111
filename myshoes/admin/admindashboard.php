<?php
    session_start();
    require '../connection/connection.php';
    if(!isset($_SESSION['admin_id'])){
        header('location:login.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title></title>
</head>
<body class="back">
    <main>
        <div class="add">
        <a href="addshoes.php"><button >Add Shoes</button></a>
        <a href="view_order.php"><button>Orders</button></a>
        <a href="vp.php"><button>Products</button></a>

        </div>
        
    </main>
</body>
</html>