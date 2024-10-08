<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
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
        }

        .payment-container h2 {
            margin-bottom: 20px;
            color: black;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .course-cost {
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #68141;
        }

        .payment-methods {
            margin-bottom: 20px;
        }

        .payment-methods label {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .payment-methods input[type="radio"] {
            margin-right: 10px;
        }

        .payment-methods img {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }

        .submit-btn {
            background-color: black;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #501020; /* Optional: hover color */
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h2>Payment Page</h2>
        <form>
            <div class="form-group">
                <label for="student-id">Student ID</label>
                <input type="text" id="student-id" name="student-id" required>
            </div>
            <div class="form-group">
                <label for="course-name">Course Name</label>
                <input type="text" id="course-name" name="course-name" required>
            </div>
            <div class="form-group">
                <label for="course-id">Course ID</label>
                <input type="text" id="course-id" name="course-id" required>
            </div>
            <div class="form-group">
                <label for="course-id">Course Cost</label>
                <input type="value" id="course-cost" name="course-cost" required>
            </div>
            
            <div class="payment-methods">
                <label>Payment Method</label>
                <label>
                    <input type="radio" name="payment-method" value="bkash" required>
                    <img src="https://seeklogo.com/images/B/bkash-logo-FBB258B90F-seeklogo.com.png" alt="Bkash"> Bkash
                </label>
                <label>
                    <input type="radio" name="payment-method" value="nagad" required>
                    <img src="https://download.logo.wine/logo/Nagad/Nagad-Logo.wine.png" alt="Nagad"> Nagad
                </label>
                <label>
                    <input type="radio" name="payment-method" value="visa" required>
                    <img src="https://i.pinimg.com/736x/59/19/9a/59199a7cabe38c31af9176268cbd3eef.jpg" alt="Visa"> Visa Card
                </label>
            </div>
            <button type="submit" class="submit-btn"onclick="window.location.href='bkash.php'">Submit Payment</button> 
        </form>
    </div>
</body>
</html>
