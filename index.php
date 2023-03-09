<?php
 $lock_file = "lock.txt";

// Check if lock file exists
if (file_exists($lock_file)) {
    echo "Sorry, another user is currently accessing this page. Please try again later.";
    exit;
}
else
{
// Create lock file
$handle = fopen($lock_file, "w");
fwrite($handle, "locked");
fclose($handle);

header('Location: home.php');
unlink($lock_file);

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
