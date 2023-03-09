<?php
// Connect to the database
$db_host = "online-educational-platform-server";
$db_user = "jyhgeucacf";
$db_pass = "A5UB284AV146VV63$";
$db_name = "online-educational-platform-database";

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
  header("Location: home.php");
} else {
  // There is no user on the webpage, set the boolean variable to true and insert it into the table
  $is_on_webpage = true;

  $sql = "INSERT INTO user_status (is_on_webpage)
  VALUES ($is_on_webpage)";

  if ($conn->query($sql) === TRUE) {
    // Redirect to a different page
    header("Location: watch.php");
  } else {
    echo "Error inserting boolean value: " . $conn->error;
  }
}

// Close the database connection
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
   

    <form method="post">
        <label>Username:</label>
        <input type="text" name="username"><br>

        <label>Password:</label>
        <input type="password" name="password"><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
