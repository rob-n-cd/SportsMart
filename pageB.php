<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Net Banking Payment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Secure Payment</h1>
        <form id="paymentForm" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount (in INR)</label>
                <input type="number" id="amount" name="amount" min="1" value="500" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 ease-in-out transform hover:scale-105">
                Pay Now
            </button>
        </form>

        <div id="statusMessage" class="mt-4 p-3 rounded-md text-sm text-center hidden"></div>
    </div>

    <!-- Razorpay Checkout JS -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        // Get form elements
        const paymentForm = document.getElementById('paymentForm');
        const statusMessage = document.getElementById('statusMessage');

        // Function to display messages
        function showMessage(message, type = 'success') {
            statusMessage.textContent = message;
            statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800');
            if (type === 'success') {
                statusMessage.classList.add('bg-green-100', 'text-green-800');
            } else {
                statusMessage.classList.add('bg-red-100', 'text-red-800');
            }
        }

        // Handle form submission
        paymentForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const amount = document.getElementById('amount').value;

            try {
                // Step 1: Create an order on the server
                // The fetch call now sends all requests to a single PHP file with an 'action' parameter.
                const response = await fetch('payment-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        action: 'create_order',
                        name,
                        email,
                        amount: amount * 100 // Amount in paisa
                    })
                });

                const data = await response.json();

                if (data.error) {
                    showMessage(data.error, 'error');
                    return;
                }
                
                // Step 2: Open Razorpay Checkout with the order details
                const options = {
                    "key": data.key, // Your Razorpay Key ID
                    "amount": data.amount, // Amount in paisa
                    "currency": data.currency,
                    "name": "My E-commerce Store",
                    "description": "Purchase of goods",
                    "image": "https://placehold.co/60x60/f0f0f0/666?text=Store",
                    "order_id": data.order_id, // Order ID from the server
                    "handler": function (response) {
                        // This function is called on successful payment
                        // Step 3: Verify the payment on the server
                        fetch('payment-handler.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                ...response,
                                action: 'verify_payment' // Add action for verification
                            })
                        })
                        .then(res => res.json())
                        .then(verificationData => {
                            if (verificationData.success) {
                                showMessage("Payment Successful! Payment ID: " + verificationData.paymentId);
                                // You can redirect the user to a success page here
                            } else {
                                showMessage("Payment Verification Failed: " + verificationData.message, 'error');
                            }
                        });
                    },
                    "prefill": {
                        "name": name,
                        "email": email,
                    },
                    "theme": {
                        "color": "#4F46E5"
                    }
                };
                
                const rzp = new Razorpay(options);
                rzp.open();

            } catch (error) {
                console.error("Payment error:", error);
                showMessage("An unexpected error occurred. Please try again.", 'error');
            }
        });
    </script>
</body>
</html>

<!-- payment-handler.php -->
<?php
// This is a combined PHP script to handle both creating orders and verifying payments.
// This approach helps resolve URL parsing issues in some environments.

// IMPORTANT: You need to install the Razorpay PHP SDK via Composer.
// Run this command in your project's root directory:
// composer require razorpay/razorpay
 require('config/autoload.php'); 
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

header('Content-Type: application/json');

// Get the raw POST data
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Set your Razorpay Key ID and Key Secret
// REPLACE THESE WITH YOUR ACTUAL KEYS from the Razorpay dashboard
$keyId = 'YOUR_KEY_ID';
$keySecret = 'YOUR_KEY_SECRET';

if (!$keyId || !$keySecret) {
    http_response_code(500);
    echo json_encode(['error' => 'Razorpay keys not configured.']);
    exit;
}

$api = new Api($keyId, $keySecret);
$action = $data['action'] ?? null;

switch ($action) {
    case 'create_order':
        try {
            $amount = $data['amount'] ?? 50000; // Amount in paisa (e.g., 50000 = ₹500)
            $name = $data['name'] ?? 'Guest User';
            $email = $data['email'] ?? 'guest@example.com';
            $currency = 'INR';

            // Create the order in Razorpay
            $orderData = [
                'receipt'         => 'rcpt_1',
                'amount'          => $amount,
                'currency'        => $currency,
                'payment_capture' => 1 // Auto capture payment
            ];

            $razorpayOrder = $api->order->create($orderData);
            $orderId = $razorpayOrder['id'];

            // Return the necessary details to the client
            echo json_encode([
                'key' => $keyId,
                'amount' => $amount,
                'currency' => $currency,
                'order_id' => $orderId,
                'name' => $name,
                'email' => $email
            ]);

        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
        break;

    case 'verify_payment':
        try {
            $paymentId = $data['razorpay_payment_id'];
            $orderId = $data['razorpay_order_id'];
            $signature = $data['razorpay_signature'];

            $attributes  = array(
                'razorpay_order_id'   => $orderId,
                'razorpay_payment_id' => $paymentId,
                'razorpay_signature'  => $signature
            );

            // Verify the signature
            $api->utility->verifyPaymentSignature($attributes);

            // If the signature is valid, the payment is successful
            echo json_encode([
                'success' => true,
                'paymentId' => $paymentId,
                'message' => 'Payment successful and verified.'
            ]);

        } catch (SignatureVerificationError $e) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => 'Payment signature verification failed.',
                'error' => $e->getMessage()
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'message' => 'An error occurred during verification.',
                'error' => $e->getMessage()
            ]);
        }
        break;

    default:
        http_response_code(400);
        echo json_encode(['error' => 'Invalid action specified.']);
        break;
}
?>
