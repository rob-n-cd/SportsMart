<?php
 include('dbcon.php');


if (isset($_POST['name']) && isset($_POST['image']) && isset($_POST['price']) && isset($_POST['item_id'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $image = $conn->real_escape_string($_POST['image']);
    $price = floatval($_POST['price']);
     $item_id = intval($_POST['item_id']);

     $sqlcart = "select * from cart;";
    $cart = mysqli_query($conn,$sqlcart);  
    $flag =0; 
     while($rowcart = mysqli_fetch_assoc($cart))
     { 
        if($rowcart['item_id'] == $item_id)
        {
            $flag = 1; break;
        }
      }


      if($flag == 0){
    $sql = "INSERT INTO `cart` (`name`, `image`, price,item_id) VALUES ('$name', '$image', $price,$item_id)";

    if ($conn->query($sql) === TRUE) {
        echo "✅ '$name' added to cart!";
    } else {
        echo "❌ Error: " . $conn->error;
    }
    
    $conn->close();
} else {
     echo "'$name' already in cart!";
}
}