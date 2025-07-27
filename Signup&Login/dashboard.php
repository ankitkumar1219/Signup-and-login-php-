<?php
session_start();

if (!isset($_SESSION['name'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
    <p>Your email: <?php echo $_SESSION['email']; ?></p>

    <a href="logout.php">Logout</a>
</body>
</html>
