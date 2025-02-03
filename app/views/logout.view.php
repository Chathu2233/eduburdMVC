<?php
session_start();

// Destroy all session data
session_unset(); // Unset session variables
session_destroy(); // Destroy the session

// Redirect to login page
header("Location: login.php");
exit();
?>
