<?php
 include('dbcon.php');
$id = $_GET['id'];
    $sql = " DELETE FROM `cart` WHERE `id` = '$id'";

    if ($conn->query($sql) === TRUE) 
         header('Location:cart_box.php');
     else 
        echo "❌ Error: " . $conn->error;

