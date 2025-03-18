<?php
session_start();  // Start the session
session_destroy();  // Destroy all session data

// Redirect to the homepage or login page
header("Location: index.php");
exit();
?>