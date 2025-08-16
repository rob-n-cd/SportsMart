<?php
 include('dbcon.php');
   session_start();
if (isset($_POST['stocks']) && isset($_POST['item_id'])) {
   $stocks = intval($_POST['stocks']);
     $item_id = intval($_POST['item_id']);
      $stocks = $stocks + $_SESSION['quantity'];
     $sql = "update additems set stocks=$stocks where  id=".$item_id;
    if(mysqli_query($conn,$sql))
        {
            ?><script> window.history.back();</script>            
<?php
        }  

}?>