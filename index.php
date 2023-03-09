<?php
// Connect to the database
$db_host = "online-educational-platform-server";
$db_user = "jyhgeucacf";
$db_pass = "A5UB284AV146VV63$";
$db_name = "online-educational-platform-database";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check if the lock table exists
$check_table_query = "SELECT 1 FROM information_schema.tables WHERE table_name = 'page_lock' LIMIT 1";
$check_table_result = mysqli_query($conn, $check_table_query);

if (mysqli_num_rows($check_table_result) == 0) {
    // Create the lock table if it doesn't exist
    $create_table_query = "CREATE TABLE page_lock (id INT(1) PRIMARY KEY, locked BOOL)";
    mysqli_query($conn, $create_table_query);
    // Insert a row into the lock table
    $insert_query = "INSERT INTO page_lock (id, locked) VALUES (1, 0)";
    mysqli_query($conn, $insert_query);
}

// Lock the page
$lock_query = "UPDATE page_lock SET locked = 1 WHERE id = 1 AND locked = 0";
mysqli_query($conn, $lock_query);

if (mysqli_affected_rows($conn) == 0) {
    // Another user is currently accessing the page, so display an error message and exit
     header('Location: error.php');
    exit;
}

// Display webpage content here

// Unlock the page
$unlock_query = "UPDATE page_lock SET locked = 0 WHERE id = 1";
mysqli_query($conn, $unlock_query);

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
