<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];
    $currenttime = $_SESSION = date('Y-m-d H:i:s');

 
    $upload_dir = 'event_images/';
    $picture = $upload_dir . $_FILES['picture']['name'];
    move_uploaded_file($_FILES['picture']['tmp_name'], $picture);

    $conn = mysqli_connect("localhost", "johnreiaris", "12345", "events");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO events (title, description, picture, user_id, upload_time) VALUES ('$title',
     '$description', '$picture' , $user_id , NOW())";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: student_main.php"); 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
