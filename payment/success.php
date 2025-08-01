<?php
if (isset($_GET['payment_id'])) {
    $payment_id = htmlspecialchars($_GET['payment_id']);
    echo "<h2>✅ Payment Successful!</h2>";
    echo "<p>Payment ID: $payment_id</p>";
} else {
    echo "<h2>❌ Payment Failed or Cancelled.</h2>";
}
?>
