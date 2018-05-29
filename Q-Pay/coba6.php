<?php
// See the password_hash() example to see where this came from.
$hash = '$2y$10$xLrGhvk5Z6UpnSmxLMz9UunMrLYlChCyev5divdhmpt';

$options = array("cost"=>4);

$password = password_hash("admin",PASSWORD_BCRYPT, $options);

echo "$password";

?>