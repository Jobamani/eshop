<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to eShop</title>
    <style>
        /* Styling for the email body */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Container styling */
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        .email-header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        /* Logo in the header */
        .email-header img {
            max-width: 150px;
            margin-bottom: 15px;
        }

        /* Content */
        .email-body {
            padding: 30px;
            color: #333333;
            line-height: 1.6;
        }

        .email-body h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 15px;
        }

        .email-body p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        /* Button */
        .btn-primary {
            background-color: #4CAF50;
            color: white;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        /* Footer */
        .email-footer {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
            color: #777;
            font-size: 12px;
        }

        .email-footer a {
            color: #777;
            text-decoration: none;
        }

        .email-footer a:hover {
            color: #4CAF50;
        }

        /* Responsive */
        @media screen and (max-width: 600px) {
            .email-body {
                padding: 20px;
            }

            .email-body h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <!-- <img src="{{ asset('images/logo.png') }}" alt="eShop Logo"> -->
            <h3>eShop</h3>
            <h2>Welcome to eShop, {{ $name }}!</h2>
        </div>

        <!-- Body -->
        <div class="email-body">
            <h1>Thank You for Joining Us!</h1>
            <p>Dear {{ $name }},</p>
            <p>We're thrilled to have you with us! At <strong>eShop</strong>, we're committed to bringing you the best shopping experience. Now that you're part of our community, you can explore thousands of amazing products, exclusive deals, and much more.</p>
            
            <p>To start shopping, click the button below:</p>

            <a href="{{ url('/') }}" class="btn-primary">Start Shopping Now</a>

            <p>If you have any questions or need assistance, feel free to reach out to our customer support team. We're always here to help!</p>

            <p>Happy Shopping!</p>
            <p>The eShop Team</p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} eShop. All rights reserved.</p>
            <p><a href="{{ url('/terms') }}">Terms & Conditions</a> | <a href="{{ url('/privacy') }}">Privacy Policy</a></p>
        </div>
    </div>

</body>
</html>
