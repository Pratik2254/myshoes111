<?php 
    // include '/xampp/htdocs/myshoes/header.php';
    include_once '../connection/connection.php';
    // if(empty($_SESSION['admin_id'])){
    //     header('location:/myshoes/admin/login.php');
    // }
    if(isset($_POST['deliver'])){
        $status=$_POST['status']+1;
        $order_id=$_POST['order_id'];
        $sql='UPDATE orders SET status="'.$status.'" WHERE order_id="'.$order_id.'"';
        $result=mysqli_query($db_con,$sql);
        if(!$result){
            echo "Error: ".mysqli_error($db_con);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <div class="heading">
            <h1 style="margin: 5vh 5vw; color:#5eb85a; margin-left:520px;">Order table</h1>
        </div>
        <div class="admin_table">
            <table>
                <tr>
                    <th>Sn</th>
                    <!-- <th>Image</th> -->
                    <th>Shoes Name</th>
                    <th>Quantity</th>
                    
                    <th>Delivery Address</th>
                    
                    <th>Contact Info</th>
                    
                    <th>Status</th>
                </tr>
                <?php
                    
                    $sql = 'SELECT * FROM orders';
                    if($result = mysqli_query($db_con,$sql)){
                        $sn=0;
                        foreach($result as $row){
                            $sn++;
                            
                        
                            $query3='SELECT sname FROM shoes WHERE shoes_id="'.$row['shoes_id'].'"';
                            $sname=mysqli_fetch_array(mysqli_query($db_con,$query3));
                            if($row['status']==0){
                                $delivery_satus="Ordered";
                                $color='black';
                                $button_status="Deliver Package";
                            }
                            elseif($row['status']==1){
                                $delivery_satus="Delivering";
                                $color='orange';
                                $button_status="Delivered";
                            }
                            else{
                                $delivery_satus="Delivered";
                                $color='#5eb857';
                                $button_status="Done";
                            }
                           
                ?>
                <tr>
                    <td><?= $sn?></td>
                    <td><?= $sname['sname']?></td>
                    <td><?= $row['quantity']?></td>
                    
                    <td><?= $row['delivery_location']?></td>
                    
                    <td><?= $row['contact']?></td>
                    <td style="color:<?=$color?>;"><?= $delivery_satus ?></td>
                    <td>
                        <?php
                            if($row['status']==0){ ?>
                                <form action="view_order.php" method="POST">
                                    <input type="hidden" name="status" value="<?=$row['status']?>">
                                    <input type="hidden" name="order_id" value="<?=$row['order_id']?>">
                                    <input type="submit" value="<?= $button_status?>" name="deliver" class="status_button">
                                </form>
                        <?php }
                            elseif($row['status']==1){?>
                                <form action="view_order.php" method="POST">
                                    <input type="hidden" name="status" value="<?=$row['status']?>">
                                    <input type="hidden" name="order_id" value="<?=$row['order_id']?>">
                                    <input type="submit" value="<?= $button_status?>" name="deliver" class="status_button">
                                </form>
                            <?php  
                            }
                            else{
                        ?>
                            <b style="color:#5eb85a;">Done</b>
                        <?php  
                            }
                        ?>
                    </td>
                </tr>

                <?php
                        }
                    }
                ?>
            </table>
        </div>
    </main>


</body>
</html>