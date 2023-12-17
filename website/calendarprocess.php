<?php
session_start();
$conn = mysqli_connect("localhost", "johnreiaris", "12345", "events");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SESSION['role'] === 'student') {
    header("Location: student_main.php");
} elseif ($_SESSION['role'] === 'admin') {
    header("Location: admin.php");
} else{
    header("Location: homepage.php");
}


mysqli_close($conn);
?>
