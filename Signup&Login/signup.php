<?php
// Connect to DB
$conn = mysqli_connect("localhost", "root", "", "Registration");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Check for duplicate email
$checkQuery = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($result) > 0) {
    // Duplicate email found
    echo "<script>
        alert('Signup failed: Email already exists!');
        window.location.href = 'signup.html';
    </script>";
} else {
    // Insert into DB
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Signup successful! Redirecting to login...');
            window.location.href = 'login.html';
        </script>";
    } else {
        echo "<script>
            alert('Signup failed: " . addslashes(mysqli_error($conn)) . "');
            window.location.href = 'signup.html';
        </script>";
    }
}

mysqli_close($conn);
?>
