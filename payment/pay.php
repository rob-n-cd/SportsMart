<?php
header('Content-Type: application/json');

// Simulate fetching order details or generating dynamic values
$orderId = $_GET['order_id'] ?? uniqid('order_');
$amount = 100.50; // Replace with actual order amount from database
$transactionNote = "Payment for Order " . $orderId;
$merchantVPA = "yourmerchant@bank"; // Replace with your VPA
$merchantName = "Fauget";
$currency = "INR";

// Generate a unique transaction ID for this payment
$transactionId = "TXN" . time() . rand(1000, 9999); // Simple example, use a more robust method in production

$upiLink = sprintf(
    "upi://pay?pa=%s&pn=%s&am=%.2f&cu=%s&tn=%s&tid=%s",
    urlencode($merchantVPA),
    urlencode($merchantName),
    $amount,
    urlencode($currency),
    urlencode($transactionNote),
    urlencode($transactionId)
);

echo json_encode([
    'upiLink' => $upiLink,
    'amount' => $amount,
    'transactionId' => $transactionId,
    'vpa' => $merchantVPA,
    'note' => $transactionNote
]);
?>