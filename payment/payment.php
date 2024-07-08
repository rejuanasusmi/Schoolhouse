<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Button</title>
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #554bae; /* Optional: background color */
            font-family: Arial, sans-serif; /* Optional: font style */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }

        .center-button {
            padding: 10px 20px;
            font-size: 16px;
            color: #9c5757;
            background-color: #579c61;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .center-button:hover {
            background-color: #501020; /* Optional: hover color */
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="next.php" class="center-button">Click Me</a>
    </div>
</body>
</html>
