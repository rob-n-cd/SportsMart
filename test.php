<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Bill</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #e0f7fa, #f1f8e9);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .bill-container {
      background: #fff;
      padding: 20px;
      width: 350px;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.2);
      position: relative;
      overflow: hidden;
    }

    /* Receipt cut-edge effect */
    .bill-container::before,
    .bill-container::after {
      content: "";
      position: absolute;
      left: 0;
      right: 0;
      height: 20px;
      background: repeating-linear-gradient(
        90deg,
        #fff,
        #fff 10px,
        transparent 10px,
        transparent 20px
      );
    }
    .bill-container::before { top: -10px; }
    .bill-container::after { bottom: -10px; }

    .bill-header {
      text-align: center;
      border-bottom: 2px dashed #444;
      padding-bottom: 10px;
    }

    .bill-header h2 {
      margin: 0;
      font-size: 22px;
      color: #009688;
    }

    .bill-header small {
      font-size: 12px;
      color: #555;
    }

    .bill-details {
      font-size: 14px;
      margin: 15px 0;
      padding: 8px;
      background: #f9fbe7;
      border-radius: 6px;
    }

    .bill-details strong {
      color: #33691e;
    }

    /* Table-like styling */
    .item {
      margin-top: 15px;
      font-size: 15px;
      border: 1px dashed #aaa;
      border-radius: 8px;
      padding: 12px;
      background: #fafafa;
    }

    .row {
      display: grid;
      grid-template-columns: 1fr 1fr; /* equal space */
      padding: 5px 0;
      border-bottom: 1px dotted #ccc;
    }

    .row:last-child {
      border-bottom: none;
    }

    .row strong {
      color: #009688;
    }

    .total {
      text-align: right;
      font-size: 18px;
      font-weight: bold;
      margin-top: 15px;
      color: #d32f2f;
    }

    .bill-footer {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
      border-top: 2px dashed #444;
      padding-top: 10px;
      color: #444;
    }

    .btn {
      margin-top: 12px;
      display: block;
      width: 100%;
      padding: 12px;
      font-size: 16px;
      font-weight: bold;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn-print {
      background: linear-gradient(135deg, #00c853, #009624);
      box-shadow: 0 4px 10px rgba(0,200,83,0.4);
    }

    .btn-print:hover {
      background: linear-gradient(135deg, #00e676, #00c853);
      box-shadow: 0 6px 15px rgba(0,200,83,0.6);
      transform: scale(1.05);
    }

    .btn-ok {
      background: linear-gradient(135deg, #2196f3, #1565c0);
      box-shadow: 0 4px 10px rgba(33,150,243,0.4);
    }

    .btn-ok:hover {
      background: linear-gradient(135deg, #42a5f5, #1e88e5);
      box-shadow: 0 6px 15px rgba(33,150,243,0.6);
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <div class="bill-container" id="bill">
    <div class="bill-header">
      <h2>🛍️ My Trendy Shop</h2>
      <small>Your style, our passion</small>
      <div>Date: <span id="bill-date"></span></div>
      <div>Bill No: <span id="bill-no"></span></div>
    </div>

    <div class="bill-details">
      Customer: <strong>John Doe</strong>
    </div>

    <!-- Single item neatly aligned -->
    <div class="item">
      <div class="row"><strong>Item:</strong> <span>T-shirt</span></div>
      <div class="row"><strong>Quantity:</strong> <span>2</span></div>
      <div class="row"><strong>Price:</strong> <span>₹500</span></div>
      <div class="row"><strong>Total:</strong> <span>₹1000</span></div>
    </div>

    <div class="total">Grand Total: ₹1000</div>

    <div class="bill-footer">
    
    </div>

    <button class="btn btn-print" onclick="printBill()">🖨 Print Bill</button>
    <button class="btn btn-ok" onclick="okAction()">✅ OK</button>
  </div>

  <script>
    function loadBill() {
      document.getElementById("bill-date").innerText = new Date().toLocaleDateString();
      document.getElementById("bill-no").innerText = Math.floor(Math.random() * 100000);
    }

    function printBill() {
      const bill = document.getElementById("bill").innerHTML;
      const printWin = window.open('', '', 'width=400,height=600');
      printWin.document.write('<html><head><title>Bill</title>');
      // ✅ include CSS for printed bill
      printWin.document.write('<style>');
      printWin.document.write(`
        body { font-family: 'Segoe UI', sans-serif; }
        .bill-container {
          background: #fff;
          padding: 20px;
          width: 350px;
          border-radius: 15px;
          box-shadow: 0 5px 20px rgba(0,0,0,0.2);
          margin: auto;
        }
        .bill-header { text-align: center; border-bottom: 2px dashed #444; padding-bottom: 10px; }
        .bill-header h2 { margin: 0; font-size: 22px; color: #009688; }
        .bill-details { font-size: 14px; margin: 15px 0; padding: 8px; background: #f9fbe7; border-radius: 6px; }
        .item { margin-top: 15px; font-size: 15px; border: 1px dashed #aaa; border-radius: 8px; padding: 12px; background: #fafafa; }
        .row { display: grid; grid-template-columns: 1fr 1fr; padding: 5px 0; border-bottom: 1px dotted #ccc; }
        .row:last-child { border-bottom: none; }
        .total { text-align: right; font-size: 18px; font-weight: bold; margin-top: 15px; color: #d32f2f; }
        .bill-footer { text-align: center; margin-top: 15px; font-size: 14px; border-top: 2px dashed #444; padding-top: 10px; color: #444; }
      `);
      printWin.document.write('</style></head><body>');
      printWin.document.write(bill);
      printWin.document.write('</body></html>');
      printWin.document.close();
      printWin.print();
    }

    function okAction() {
      alert("✅ Thank you for shopping.");
      // Example redirect: window.location.href = "homepage.html";
    }

    loadBill();
  </script>
</body>
</html>
