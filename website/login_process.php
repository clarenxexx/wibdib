<?php
session_start();
$conn = mysqli_connect("localhost", "johnreiaris", "12345", "events");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $row['password'])) {
    
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['username'] = $row['username']; 
        if ($_SESSION['role'] === 'student') {
            header("Location: student_main.php");
        } elseif ($_SESSION['role'] === 'admin') {
            header("Location: admin.php");
        } else{
            header("Location: homepage.php");
        }
    } else {
        echo "Invalid password";
    }
} else {
    echo "User not found";
}

mysqli_close($conn);
?>
