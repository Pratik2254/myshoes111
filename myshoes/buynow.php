<?php
    session_start();
    require 'connection/connection.php';
    if(isset($_POST['checkout'])){
        $cart_id=$_POST['cart_id'];
        $shoes_id=$_POST['shoes_id'];
        $cid=$_POST['cid'];
        $delivery_location=$_POST['delivery_location'];
        $contact=$_POST['contact'];
        $payment_id=$_POST['payment'];
        if(!empty($cid) && !empty($delivery_location) && !empty($contact) && !empty($payment_id)){
            $sql='INSERT INTO orders(delivery_location,contact,cid,shoes_id,payment_id) VALUES("'.$delivery_location.'","'.$contact.'","'.$cid.'","'.$shoes_id.'","'.$payment_id.'")';
            if(mysqli_query($db_con,$sql)){
                $query1='DELETE FROM cart where cart_id = "'.$cart_id.'"';
                if(mysqli_query($db_con,$query1)){
                    header('location:index.php');
                }
                else{
                    echo 'Error: '.mysqli_error($db_con);
                }
            }
            else{
                echo 'Error: '.mysqli_error($db_con);
            }
        }
        else{
            echo 'Error: All field required';
        }
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
                
                    <?php
                    if(isset($_GET['order_info'])){
                        $cart_id=$_GET['order_info'];

                        
                        $query="SELECT * FROM cart WHERE cart_id = '".$cart_id."'";
                        $result = mysqli_query($db_con,$query);
                        if($result){
                                $row=mysqli_fetch_array($result);
                                $shoes_id=$row['shoes_id'];
                                $sql = 'SELECT * FROM shoes WHERE shoes_id = "'.$shoes_id.'"';
                                if($result5=mysqli_query($db_con,$sql)){
                                    while($phone = mysqli_fetch_array($result5)){
                                        
                           
                         ?>
                         <form action="buynow.php" method="post">
                            <input type="text" id="contact" name="contact" placeholder="Enter your available phone number"><br>
                            <input type="text" id="delivery_location" name="delivery_location" placeholder="Enter delivery Address"><br>
                            <label for="total_price"><b>Price: &emsp;</b>Rs.</label>
                            <input type="money" readonly name="price" id="price" value="<?= $phone['price']?>"><br>


                            <label for="payment">Enter your desired mode of payment:</label><br>
                            <input type="radio" id="cod" name="payment" value="1" checked>
                            <label for="cod">Cash on delivery</label><br>
                            <input type="radio" id="esewa" name="payment" value="2">
                            <label for="esewa">Esewa</label><br>
                            <input type="radio" id="khalti" name="payment" value="3">
                            <label for="khalti">Khalti</label><br>
                            <input type="radio" id="phonepay" name="payment" value="4">
                            <label for="khalti">Phone Pay</label><br>

                            <input type="hidden" name="shoes_id" value="<?= $row['shoes_id']?>">
                            <input type="hidden" name="cid" value="<?= $row['cid']?>">
                            <input type="hidden" name="cart_id" value="<?= $cart_id?>">

                            <input type="submit" name="checkout" id="checkout" value="Checkout">
                         </form>
                        
                        <?php
                                    }
                                    
                                }
                            }
                        }
                        ?>
                    
            </div>
            
            </main>
            <footer class="footer">
               <div class="container">
                <center>
                   <p>Copyright &copy <a href="https://www.nike.com/">My Shop</a> Store. All Rights Reserved.</p>
               </center>
               </div>
           </footer>
        
    </body>
</html>