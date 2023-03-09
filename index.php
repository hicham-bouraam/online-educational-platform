<?php
// Database connection parameters
$servername =  "online-educational-platform-server";
$username = "jyhgeucacf";
$password = "A5UB284AV146VV63$";
$dbname = "online-educational-platform-database";;

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if there is already a user on the webpage
$sql = "SELECT is_on_webpage FROM user_status LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // There is already a user on the webpage, redirect to a different page
  header("Location: other_page.php");
  exit();
} else {
  // There is no user on the webpage, set the boolean variable to true and insert it into the table
  $is_on_webpage = true;

  $sql = "INSERT INTO user_status (is_on_webpage)
  VALUES ($is_on_webpage)";

  if ($conn->query($sql) === TRUE) {
    // User is the first one on the webpage, allow access
  } else {
    echo "Error inserting boolean value: " . $conn->error;
  }
}

// Close the database connection
$conn->close();

// Start your HTML content below this point
?>
<!DOCTYPE html>
<html>
  <head>
    <title>My Webpage</title>
  </head>
  <body>
    <h1>Welcome to my webpage</h1>
    <p>This is some content on my webpage.</p>
  </body>
</html>
