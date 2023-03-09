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

// Create a table with a boolean column
$sql = "CREATE TABLE user_status (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  is_on_webpage TINYINT(1) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Set the boolean variable to true to indicate that the user is on the webpage
$is_on_webpage = true;

// Insert the boolean variable into the table
$sql = "INSERT INTO user_status (is_on_webpage)
VALUES ($is_on_webpage)";

if ($conn->query($sql) === TRUE) {
  echo "Boolean value inserted successfully";
} else {
  echo "Error inserting boolean value: " . $conn->error;
}

// Close the database connection
$conn->close();


// Check if the user has submitted the login form
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Validate the username and password here
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'password') {
        // Set the session variable to mark the user as logged in
        $_SESSION['username'] = $_POST['username'];

        // Redirect to the secure page or display a success message
        header('Location: home.php');
        exit;
    } else {
        // Display an error message
        $error = 'Invalid username or password';
    }
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>

    <form method="post">
        <label>Username:</label>
        <input type="text" name="username"><br>

        <label>Password:</label>
        <input type="password" name="password"><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
