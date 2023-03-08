<?php
session_start(); // Start the session

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    // Redirect to another page or display an error message
    header('Location: error.php');
    exit;
}

// Check if the user has submitted the login form

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
