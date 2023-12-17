<?php
$conn = mysqli_connect("localhost", "johnreiaris", "12345", "events");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$role = $_POST['role'];

// Check if the user is registering as an admin
if ($role === 'admin') {
    // Check if the secret code matches
    $secretCode = isset($_POST['secret_code']) ? $_POST['secret_code'] : '';

    if ($secretCode !== '123456789') {
        echo '<script>alert("Invalid secret code. Registration failed.");</script>';
        echo '<script>window.location.href = "register.php";</script>';
        exit;
    }
}

$checkQuery = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($result) > 0) {
    echo '<script>alert("Account already exists. Please choose a different username.");</script>';
    echo '<script>window.location.href = "register.php";</script>';
} else {
    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Registration successful!");</script>';
        echo '<script>window.location.href = "login.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>