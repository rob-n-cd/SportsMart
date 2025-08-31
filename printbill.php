 
 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smproject";
$flag=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php  
      session_start();

  $pick_book_id = "select * from booking;";
    $run_id = mysqli_query($conn,$pick_book_id);  
     while($row_id = mysqli_fetch_assoc($run_id))
     {  
      $id = $row_id['location'];  
    }
    print($id);


     
      ?>
