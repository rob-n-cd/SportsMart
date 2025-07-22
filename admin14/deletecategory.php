<?php	
include("dbcon.php");
$id = $_GET['cid'];
$sql = "update category set status=2 where  cid=".$id;

$conn->query($sql);

 header('location:categorys.php');
?>