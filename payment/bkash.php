<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bkash Payment</title>
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            background-color: #f0f0f0; /* Optional: background color */
            font-family: Arial, sans-serif; /* Optional: font style */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .payment-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .payment-container h2 {
            margin-bottom: 20px;
            color: black;
        }

        .payment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .payment-header img {
            width: 150px;
        }

        .invoice-info {
            text-align: left;
            color: #666;
            margin-bottom: 20px;
        }

        .amount {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            color: #68141;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #68141;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .terms {
            font-size: 12px;
            color: #666;
            margin-bottom: 20px;
        }

        .terms a {
            color: #68141;
            text-decoration: none;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
        }

        .btn-group button {
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-close {
            background-color: #ccc;
            color: #333;
        }

        .btn-confirm {
            background-color: #68141;
            color: #fff;
        }

        .btn-close:hover {
            background-color: #aaa;
        }

        .btn-confirm:hover {
            background-color: #501020;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <div class="payment-header">
            <img src="https://seeklogo.com/images/B/bkash-logo-FBB258B90F-seeklogo.com.png" alt="Bkash">
            <div class="amount">৳1085</div>
        </div>
        <div class="invoice-info">
            <div>TestCheckoutDemoMerchant1</div>
            <div>Invoice: 3221</div>
        </div>
        <div class="form-group">
            <label for="bkash-number">Your Bkash Account number</label>
            <input type="text" id="bkash-number" name="bkash-number" placeholder="e.g 01XXXXXXXXX" required>
        </div>
        <div class="terms">
            By clicking on Confirm, you are agreeing to the <a href="#">terms & conditions</a>
        </div>
        <div class="btn-group">
            <button type="button" class="btn-close" onclick="history.back()">Close</button>
            <button type="button" class="btn-confirm" onclick="location.href='otp.php'">Confirm</button>
        </div>
        <div>
           
        </div>
    </div>
</body>
</html>
