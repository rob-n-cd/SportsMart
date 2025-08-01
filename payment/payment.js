document.getElementById("payBtn").onclick = function(e){
  var options = {
    "key": "YOUR_RAZORPAY_KEY_ID",
    "amount": 50000, 
    "currency": "INR",
    "name": "Your Store",
    "description": "Product Payment",
    "key": "rzp_test_YourTestKeyHere",
    "image": "https://your-logo-url.com/logo.png",
    "handler": function (response){
      window.location.href = "success.php?payment_id=" + response.razorpay_payment_id;
    },
    "modal": {
      "ondismiss": function(){
        alert("Payment popup closed without completing.");
      }
    },
    "theme": {
        "color": "#3399cc"
    }
  };

  var rzp = new Razorpay(options);

  rzp.on('payment.failed', function (response){
      alert("Oops! Something went wrong.\nPayment Failed\nReason: " + response.error.description);
  });

  rzp.open();
  e.preventDefault();
}
