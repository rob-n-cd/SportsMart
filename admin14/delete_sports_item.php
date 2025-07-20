<?php	
include("dbcon.php");
$bid = $_GET['id'];
$sql = "update additems set status=2 where  id=".$bid;

$conn->query($sql);

 header('location:addsports.php');
?>