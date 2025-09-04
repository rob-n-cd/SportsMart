<?php  include('dbcon.php');
      session_start();
      $user = $_SESSION['user'];
       
    $user_sql = "select * from register where username = '$user';";
    $user_res = mysqli_query($conn,$user_sql);
    $user_row = mysqli_fetch_assoc($user_res);
?>



<?php
if (  $_SESSION['cart_flag'] === 0) {
  $cart_item = $_SESSION['id'];
$pick_cart_row = "select * from cart where item_id= ".$cart_item.";";
    $run_cart_id = mysqli_query($conn,$pick_cart_row);  
  $row_cart = mysqli_fetch_assoc($run_cart_id);
  $cart_id = $row_cart['id'];

  $delete_sql = " DELETE FROM `cart` WHERE `id` = '$cart_id'";
  mysqli_query($conn,$delete_sql);

  
  $pick_book_id = "select * from booking;";
    $run_book_id = mysqli_query($conn,$pick_book_id);  
     while($row_id = mysqli_fetch_assoc($run_book_id))
     {  
      $book_id= $row_id['id'];  
    } 
        $_SESSION['book_id'] = $book_id;


   $pick_pay_id = "select * from payment;";
      $run_pay_id = mysqli_query($conn,$pick_pay_id);  
       while($row_pay_id = mysqli_fetch_assoc($run_pay_id))
        {  
          $pay_id= $row_pay_id['id'];  
         } 
           $_SESSION['pay_id'] = $pay_id;
      
      $last_data =  "select * from booking where id = '$book_id';";
      $run_last_data = mysqli_query($conn,$last_data);
      $row_last =  mysqli_fetch_assoc($run_last_data);
      $item_name = $row_last['itemname'];
      $price = $row_last['price'];
      $quantity =   $_SESSION['quandity'];
      $cust_name = $user;
      $location =$row_last['location'];
      $phone = $user_row['phonenumber'];
      $pin_code = $row_last['pincode'];
      $date = $row_last['date'];
      $bid = $row_last['id'];
      $pid = $pay_id;
      $insert_buy = " INSERT INTO `buyhistory` (`item_name`,total_price,quantity,`cust_name`,`location`,phone,pincode,`date`,book_id,pay_id) VALUES ('$item_name','$price','$quantity','$cust_name','$location','$phone','$pin_code','$date','$bid','$pid');";
      if(mysqli_query($conn,$insert_buy))
        header('Location:completepayment.php');
      else
        echo "Error: " . $insert_buy . "<br>" . $conn->error;
  
  }
  else
  {  
  
  $pick_book_id = "select * from booking;";
    $run_book_id = mysqli_query($conn,$pick_book_id);  
     while($row_id = mysqli_fetch_assoc($run_book_id))
     {  
      $book_id= $row_id['id'];  
    } 
        $_SESSION['book_id'] = $book_id;


   $pick_pay_id = "select * from payment;";
      $run_pay_id = mysqli_query($conn,$pick_pay_id);  
       while($row_pay_id = mysqli_fetch_assoc($run_pay_id))
        {  
          $pay_id= $row_pay_id['id'];  
         } 
           $_SESSION['pay_id'] = $pay_id;
      
      $last_data =  "select * from booking where id = '$book_id';";
      $run_last_data = mysqli_query($conn,$last_data);
      $row_last =  mysqli_fetch_assoc($run_last_data);
      $item_name = $row_last['itemname'];
      $price = $row_last['price'];
      $quantity =   $_SESSION['quandity'];
      $cust_name = $user;
      $location =$row_last['location'];
      $phone = $user_row['phonenumber'];
      $pin_code = $row_last['pincode'];
      $date = $row_last['date'];
      $bid = $row_last['id'];
      $pid = $pay_id;
      $insert_buy = " INSERT INTO `buyhistory` (`item_name`,total_price,quantity,`cust_name`,`location`,phone,pincode,`date`,book_id,pay_id) VALUES ('$item_name','$price','$quantity','$cust_name','$location','$phone','$pin_code','$date','$bid','$pid');";
      if(mysqli_query($conn,$insert_buy))
        header('Location:completepayment.php');
      else
        echo "Error: " . $insert_buy . "<br>" . $conn->error;
  
  }
 
      ?>
    
