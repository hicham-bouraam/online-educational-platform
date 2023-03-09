<?php
session_start(); // Start the session

// Check if the user is already logged in
if (true) {
    // Redirect to another page or display an error message
    header('Location: error.php');
    exit;
}

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
