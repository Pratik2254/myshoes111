<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>My Shoes</title>
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
        <div class="one">
           <?php
            require 'header.php';
           ?>
           <div id="bannerImage">
               <div class="container">
                   <center>
                   <div id="bannerContent">
                       <h1>We provide</h1>
                       <p style="color:black; font-size:20px"> 30% Flat Discount on all premium brands. <br>
                                 
                       </p>
                   </div>
                   </center>
               </div>
           </div>
           <div class="container one">
               <div class="row one">
                   
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail ">
                           <a href="products.php?brand=nike">
                               <img src="img/nike.png" alt="nike">
                           </a>
                           <center>
                                <div class="caption">
                                    <p id="autoResize">Nike</p>
                                    <p>Just Do It..</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php?brand=adidas">
                               <img src="img/adidas.png" alt="adidas">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Adidas</p>
                                   <p>Impossible is Nothing.</p>
                               </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php?brand=goldstar">
                               <img src="img/gold.png" alt="goldstar">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Goldstar</p>
                                   <p>Hathi Balio Ki Hathi Chap Chappal.</p>
                               </div>
                           </center>
                       </div>
                   </div>
               </div>
           </div>
            <br><br> <br><br><br><br>
            <footer class="footer">
               <div class="container">
                    <div class="footer_class">
                    <div class="connected" >
                       <p>keep In Touch</p>
                       <P <i class="fa-regular fa-location-arrow"></i>>My Shoes,KTM</P>
                       <p <i class="fa-regular fa-phone"></i>>9862256762</p>
                       <a href="https://www.nike.com/">My Shoes</a> </P>
                     </div>
                     <div class="conn">
                      <p id="two" >Give your feet the beauty treatment that only brand new shoes can give. <br>
                         From our store to your legs. <br>Step and spread shine.

                        </p>
                      </div>
                    </div>
                    
                    
                 
                   <center>
                     <p>Copyright &copy <a href="https://www.nike.com/">My Shoes</a> Store. All Rights Reserved.</p>
                   </center>
               </div>
           </footer>
        </div>
    </body>
</html>