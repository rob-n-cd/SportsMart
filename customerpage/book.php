
<?php
include "dbcon.php";

if (isset($_POST['book_id'])) {
    $book_id = intval($_POST['book_id']);
   
    

    $book_sql = " SELECT * FROM additems WHERE id = $book_id; ";
    $book_result = $conn->query($book_sql);
        $book_row = mysqli_fetch_assoc($book_result);
           echo "   
 
      ";
        
         exit(); // Important: Stop script after AJAX response
    } 
   
?>
