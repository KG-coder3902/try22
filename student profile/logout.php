<?php
// Initialize the session.
session_start();
// Unset all of the session variables.
unset($_SESSION['userID']);
unset($_SESSION['userID']);
session_unset();
// Finally, destroy the session.    
session_destroy();

// Include URL for Login page to login again.
header("Location: ..\pages-login.html");
exit;
