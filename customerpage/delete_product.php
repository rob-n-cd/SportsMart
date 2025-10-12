<?php
include('dbcon.php');
if(isset($_GET['id']))
{
    $pid = intval($_GET['id']);
    $display_sql_book = "SELECT `book_id`,`pay_id` FROM `buyhistory` WHERE `id` ='$pid'";
    $display_result = mysqli_query($conn,$display_sql_book);
    $display_row =  mysqli_fetch_assoc($display_result);
    $booking_id = $display_row['book_id'];
    $payment_id = $display_row['pay_id'];

    $sql_booking = "DELETE FROM `booking` WHERE `id` = '$booking_id'"; 
    $sql_payment = "DELETE FROM `payment` WHERE `id` = '$payment_id'";
    $sql = "DELETE FROM `buyhistory` WHERE `id` = '$pid'";
    if(mysqli_query($conn,$sql)  && mysqli_query($conn,$sql_booking) && mysqli_query($conn,$sql_payment) )
        header('Location:buy_history.php');
     else
        echo "failed";
}
?>