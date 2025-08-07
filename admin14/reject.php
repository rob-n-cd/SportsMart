<?php include 'dbcon.php';
 if(isset($_POST['reject'])){
    $id = $_GET['id'];
  
  
    $sql = "update register set status = 3 where id = '$id';";
    if(mysqli_query($conn,$sql))
        header("location: userdetails.php");
 }
?>