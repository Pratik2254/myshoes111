<?php
    require 'connection/connection.php';
    session_start();
    $cart_id=$_GET['cart_id'];
    $cid=$_SESSION['cid'];
    echo $cart_id;
    $delete_query="delete from cart where cid='$cid' and cart_id='$cart_id'";
    $delete_query_result=mysqli_query($db_con,$delete_query) or die(mysqli_error($db_con));
    header('location: cart.php');
?>