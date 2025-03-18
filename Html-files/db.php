<?php
// Database configuration settings
$servername = "localhost"; // Change this to your server address, e.g., "localhost" for local database or an IP address for remote
$username = "root"; // Your database username (e.g., "root" for local development)
$password = ""; // Your database password (default is empty for local MySQL installations)
$dbname = "thecabinbrewerydb"; // The name of the database you're working with (change it as per your setup)

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally, you can set the charset for the connection to ensure proper handling of characters
$conn->set_charset("utf8");

// Now the $conn variable is ready to be used in other parts of your code to run queries
?>
