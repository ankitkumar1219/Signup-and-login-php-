<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "Registration");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['name'] = $user['name'];
    $_SESSION['email'] = $user['email']; // store email too

    // Redirect to dashboard
    header("Location: dashboard.php");
} else {
    echo "<script>
        alert('Login failed! Invalid email or password.');
        window.location.href = 'login.html';
    </script>";

}

mysqli_close($conn);
?>
