<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment Successful</title>
  <style>
    body {
      margin: 0;
      overflow: hidden;
      background: linear-gradient(to top, #001d3d, #87ceeb);
      height: 100vh;
      font-family: Arial, sans-serif;
      text-align: center;
      color: white;
    }

    .sky {
      position: absolute;
      width: 100%;
      height: 100%;
      background: linear-gradient(to top, #001d3d, #87ceeb);
      z-index: -1;
    }

    .sun-container {
      position: absolute;
      bottom: -120px;
      left: 50%;
      transform: translateX(-50%);
      animation: riseSun 5s ease-in-out forwards;
    }

    .sun {
      width: 120px;
      height: 120px;
      background: radial-gradient(circle, #ffdf00, #ffae00);
      border-radius: 50%;
      box-shadow: 0 0 60px 25px rgba(255, 223, 0, 0.5); /* Glow effect */
    }

    @keyframes riseSun {
      0% {
        bottom: -120px;
      }
      100% {
        bottom: 300px;
      }
    }

    .success-text {
      font-size: 2rem;
      margin-top: 80px;
      animation: fadeIn 2s ease-in;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }

    .message {
      position: fixed;
      top: 55%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 1.6rem;
      opacity: 0;
      animation: showMessage 2s 5s forwards;
      z-index: 2;
    }

    @keyframes showMessage {
      to {
        opacity: 1;
      }
    }

    .next-btn {
      position: fixed;
      top: 67%;
      left: 50%;
      transform: translateX(-50%);
      padding: 12px 24px;
      font-size: 1rem;
      background: #00b894;
      border: none;
      border-radius: 6px;
      color: white;
      cursor: pointer;
      display: none;
      z-index: 2;
    }

    .next-btn:hover {
      background: #019875;
    }

  </style>
</head>
<body>

  <div class="sky"></div>

  <div class="success-text">🎉 Payment Successful!</div>

  <div class="sun-container">
    <div class="sun"></div>
  </div>

  <div class="message" id="thankMessage">☀️ Thanks for pay</div>

  <button class="next-btn" id="nextBtn" onclick="nextStep()">Next Step</button>

  <script>
    // Show button after animation
    setTimeout(() => {
      document.getElementById("nextBtn").style.display = "inline-block";
    }, 5000);

    function nextStep() {
      window.location.href = "next-page.html"; // Your next page link
    }
  </script>

</body>
</html>
