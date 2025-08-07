<?php include 'dbcon.php';
 if(isset($_POST['accept'])){
    $id = $_GET['id'];
  
  
    $sql = "update register set status = 2 where id = '$id';";
    if(mysqli_query($conn,$sql))
        header("location: userdetails.php");
 }
?>