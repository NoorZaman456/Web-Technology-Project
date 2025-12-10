<?php 
session_start();
// Unset session variables
session_unset();
// Destroy the session
session_destroy();
// Clear any authentication cookies
setcookie('flag', '', time() - 3600, '/');

// Debugging path resolution
echo "Redirecting to: " . realpath('../view/login.html');
exit();
?>
