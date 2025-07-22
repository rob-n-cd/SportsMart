<?php
 include('dbcon.php');


if (isset($_POST['name']) && isset($_POST['image']) && isset($_POST['price'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $image = $conn->real_escape_string($_POST['image']);
    $price = floatval($_POST['price']);

    $sql = "INSERT INTO `cart` (`name`, `image`, price) VALUES ('$name', '$image', $price)";

    if ($conn->query($sql) === TRUE) {
        echo "✅ '$name' added to cart!";
    } else {
        echo "❌ Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "❌ Missing data.";
}