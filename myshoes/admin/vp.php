<?php
    include_once '../connection/connection.php';
    // include '/xampp/htdocs/myshoes/header.php';
    if(isset($_POST['submit'])){
        $target = "image/".basename($_FILES['image']['name']);
        $image=$_FILES['image']['name'];
        $sname=$_POST['sname'];
        $price=$_POST['price'];
        $description=$_POST['description'];
        $brand=$_POST['brand'];



        $sql = 'INSERT INTO shoes(sname,price,image,description,brand) VALUES("'.$sname.'","'.$price.'","'.$image.'","'.$description.'","'.$brand.'")';
        $result=mysqli_query($db_con,$sql);
        if($result){
            if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                header('location:addshoes.php');
            }
            else{
                echo 'Some error occured';
            }
        }
        else{
            die("Error: " . mysqli_error($db_con));
        }
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
    <title>Add Shoes</title>
</head>
<body>
    <div id="showshoes">
                <div class="shoesheading">
                    <h2 style="margin-left:5vw;">Product List</h2>
                </div>
                <table>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Company</th>
                        <!-- <th>Delete shoes</th> -->
                    </tr>
                    <?php
                        include_once '../connection/connection.php';
                        $query="SELECT * FROM shoes";
                        $result=mysqli_query($db_con,$query);
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$row['shoes_id']."</td>";
                            echo "<td>".$row['sname']."</td>";
                            echo "<td>".$row['brand']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
</body>
</html>