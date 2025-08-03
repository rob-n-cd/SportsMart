<?php include 'dbcon.php';
 if(isset($_POST['reset'])){
    $id = $_GET['id'];
    $value = $_POST['set'];
     if($value != 0)
    {
    $sql = "update additems set stocks = '$value' where id = '$id';";
    if(mysqli_query($conn,$sql))
        header("location: viewoutofstocks.php");
    }
    else
     header("location: viewoutofstocks.php");


 }
?>