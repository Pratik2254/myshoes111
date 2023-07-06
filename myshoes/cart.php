<?php
    session_start();
    require 'connection/connection.php';
    if(!isset($_SESSION['cid'])){
        header('location: login.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
        
            <?php 
               require 'header.php';
            ?>
            <br>
            <main>
            <div class="container">
                <table class="table table-bordered table-striped">
                    <tbody>
                    
                        <tr>
                            <th>Item Number</th>
                            <th>Item Name</th>
                            <th>Price</th>
                        </tr>
                       <?php
                        $cid=$_SESSION['cid'];

                        
                        $query="SELECT * FROM cart WHERE cid = '".$cid."'";
                        $result = mysqli_query($db_con,$query);
                        if($result){
                            $sn=0;
                            foreach($result as $row){
                                $sn++;
                                $shoes_id=$row['shoes_id'];
                                $sql = 'SELECT * FROM shoes WHERE shoes_id = "'.$shoes_id.'"';
                                $result5=mysqli_query($db_con,$sql);
                                if($result5){
                                    while($shoes = mysqli_fetch_array($result5)){
                                        
                           
                         ?>
                        <tr>
                            <th><?php echo $sn ?></th>
                            <th><?php echo $shoes['sname']?></th>
                            <th><?php echo $shoes['price']?></th>
                            <th><a href='buynow.php?order_info=<?php echo $row['cart_id'] ?>'>Checkout</a></th>
                            <th><a href='cart_remove.php?cart_id=<?php echo $row['cart_id'] ?>'>Remove</a></th>
                        </tr>
                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
            </main>
    </body>
</html>