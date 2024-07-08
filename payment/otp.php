<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            background-color: #dc5383;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .otp-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }

        .otp-container h2 {
            color: #000;
            margin-bottom: 10px;
        }

        .otp-container p {
            color: #333;
            margin-bottom: 20px;
        }

        .otp-input {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .otp-input input {
            width: 50px;
            height: 50px;
            margin: 0 5px;
            font-size: 20px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-btn {
            background-color: #ff4081;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            box-sizing: border-box;
        }

        .submit-btn:hover {
            background-color: #dc4f93;
        }

        .submit-btn .arrow {
            margin-left: 10px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="otp-container">
        <p>We have sent an OTP to your bKash mobile number, enter that OTP here.</p>
        <form>
            <div class="otp-input">
                <input type="text" maxlength="1" required>
                <input type="text" maxlength="1" required>
                <input type="text" maxlength="1" required>
                <input type="text" maxlength="1" required>
            </div>
            <button type="button" class="submit-btn" onclick="window.location.href='next_page.html'">
                Submit <span class="arrow">→</span>
            </button>
        </form>
    </div>
</body>
</html>
