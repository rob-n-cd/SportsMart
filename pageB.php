
<?php/*
if (isset($_SESSION['id'])) {
  $cart_item = $_SESSION['id'];
$pick_cart_row = "select * from cart where item_id= ".$cart_item.";";
    $run_id = mysqli_query($conn,$pick_cart_row);  
  $row_cart = mysqli_fetch_assoc($run_id);
  $cart_id = $row_cart['id'];


  
  $pick_book_id = "select * from booking;";
    $run_id = mysqli_query($conn,$pick_book_id);  
     while($row_id = mysqli_fetch_assoc($run_id))
     {  
      $book_id= $row_id['id'];  
    } 
  }
  else
?>
<?php
  {  
  $pick_book_id = "select * from booking;";
    $run_id = mysqli_query($conn,$pick_book_id);  
     while($row_id = mysqli_fetch_assoc($run_id))
     {  
      $book_id= $row_id['id'];  
    } 
  }
      */?>
