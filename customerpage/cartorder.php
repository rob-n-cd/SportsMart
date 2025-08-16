<?php  include('dbcon.php');
      session_start();
      $user = $_SESSION['user'];
       
    $sql = "select * from register where username = '$user';";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
?>




    <?php
    if(isset($_POST['ordercart']))
    {
      $_SESSION['quandity'] = $_POST['quandity'];
      $_SESSION['total'] = $_POST['total'];
    }
    
   $_SESSION['id']  =  $book_id = $_GET['book_id'];
          $book_sql = "SELECT * FROM `additems` where `id` = $book_id;";
          $book_result =  mysqli_query($conn,$book_sql);
          $book_row=mysqli_fetch_assoc($book_result);
           
          if( $_SESSION['quandity'] <= $book_row['stocks'] ){
            $update_stock = $book_row['stocks'] - $_SESSION['quandity'];
          $update = "update additems set stocks = '$update_stock' where  id=$book_id";
          $update_stock_status =  mysqli_query($conn,$update);
          header('Location: booking.php?book_id='.$book_id.'');
          }
          else
          {
           // $_SESSION['alert'] = "Limited";
            ?><script>
              localStorage.setItem("showAlert","Only <?php echo htmlspecialchars($book_row['stocks']);?> Items are There");
            
                   window.location.href= "cart_box.php";
               
            </script>
         
         <?php }?>

