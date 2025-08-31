<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Successful</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: #111;
      font-family: Arial, sans-serif;
      color: #fff;
    }

    .success-container {
      text-align: center;
    }

    svg {
      width: 180px;
      height: 180px;
    }

    .bg-circle {
      fill: #00c853;
      stroke: none;
      filter: drop-shadow(0 0 15px #00e676);
    }

    .arc {
      fill: none;
      stroke: #00ff99;
      stroke-width: 10;
      stroke-linecap: round;
      stroke-dasharray: 565;
      stroke-dashoffset: 565;
      animation: drawArc 2s ease forwards;
    }

    @keyframes drawArc {
      to { stroke-dashoffset: 0; }
    }

    .tick {
      stroke: #fff;
      stroke-width: 8;
      stroke-linecap: round;
      stroke-linejoin: round;
      fill: none;
      stroke-dasharray: 100;
      stroke-dashoffset: 100;
      transform-origin: center;
      transform-box: fill-box;
      animation:
        drawTick 0.8s ease forwards 2s,
        rotateTick 0.8s ease forwards 2s;
    }

    @keyframes drawTick {
      to { stroke-dashoffset: 0; }
    }

    @keyframes rotateTick {
      from { transform: rotate(-180deg); }
      to { transform: rotate(0deg); }
    }

    .message {
      margin-top: 20px;
      font-size: 1.5rem;
      font-weight: bold;
      opacity: 0;
      animation: fadeIn 1s ease forwards;
      animation-delay: 3s;
    }

    @keyframes fadeIn {
      to { opacity: 1; }
    }

    /* Bill button */
    .bill-btn {
      margin-top: 20px;
      padding: 12px 25px;
      font-size: 1rem;
      font-weight: bold;
      color: #111;
      background: #00e676;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      box-shadow: 0 0 15px #00e676;
      opacity: 0;
      transform: scale(0.9);
      animation: showBtn 0.8s ease forwards;
      animation-delay: 3.5s; /* after message */
      transition: 0.3s;
    }

    .bill-btn:hover {
      background: #00c853;
      box-shadow: 0 0 25px #00ff99;
      transform: scale(1.05);
    }

    @keyframes showBtn {
      to {
        opacity: 1;
        transform: scale(1);
      }
    }
  </style>
</head>
<body>
  <div class="success-container">
    <svg viewBox="0 0 200 200">
      <!-- filled circle -->
      <circle class="bg-circle" cx="100" cy="100" r="80" />

      <!-- animated arc (rotated so it starts at top) -->
      <circle class="arc" cx="100" cy="100" r="90" transform="rotate(-90 100 100)" />

      <!-- tick mark -->
      <polyline class="tick" points="70,100 90,125 135,75" />
    </svg>
    <div class="message">Payment Successful</div>
    <form action="viewbill.php">
    <button class="bill-btn">View Bill</button>
</form>
  </div>
</body>
</html>
