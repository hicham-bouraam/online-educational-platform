<?php
$servername =  "online-educational-platform-server.mysql.database.azure.com";
$username = "jyhgeucacf";
$password = "A5UB284AF146VV63$";
$dbname = "online-educational-platform-server";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Page</title>
</head>
<body>
    <h1>Welcome to my page!</h1>
    <p>Here's some content for the page.</p>
</body>
</html>

