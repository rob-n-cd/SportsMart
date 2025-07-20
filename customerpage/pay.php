<?php
// This part runs when the payment is completed
if (isset($_GET['payment_id'])) {
    $payment_id = $_GET['payment_id'];

    // You can verify and store the payment ID in the database here
    echo "Payment Successful! Payment ID: " . $payment_id;

    // You can also do API verification here if needed
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Example</title>
</head>
<body>

    <!-- Payment Button -->
    <button id="rzp-button1">Pay with Razorpay</button>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "YOUR_RAZORPAY_KEY_ID",
            "amount": "50000", // Amount in paise (50000 = ₹500)
            "currency": "INR",
            "name": "Your Company",
            "description": "Test Transaction",
            "handler": function (response) {
                // Redirect to same page with payment_id
                window.location.href = "?payment_id=" + response.razorpay_payment_id;
            }
        };

        var rzp1 = new Razorpay(options);
        document.getElementById('rzp-button1').onclick = function (e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>

</body>
</html>