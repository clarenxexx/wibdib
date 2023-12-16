<?php
session_start(); 

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $event_id = $_GET['id'];

    $conn = mysqli_connect("localhost", "johnreiaris", "12345", "events");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $role = $_SESSION['role'];

    
    $approval_column = $role . '_approval';
    $sql = "UPDATE events SET $approval_column = 1 WHERE id = $event_id";

    if (mysqli_query($conn, $sql)) {
       
        $sql_check_approvals = "SELECT admin_approval, dean_approval, upress_approval, staff_approval 
        FROM events WHERE id = $event_id";
        $result_check_approvals = mysqli_query($conn, $sql_check_approvals);
        $row_check_approvals = mysqli_fetch_assoc($result_check_approvals);

        if ($row_check_approvals['admin_approval'] && $row_check_approvals['dean_approval']
         && $row_check_approvals['upress_approval'] && $row_check_approvals['staff_approval']) {
            
            $sql_update_status = "UPDATE events SET status = 'approved' WHERE id = $event_id";
            mysqli_query($conn, $sql_update_status);
        }

        header("Location: manage_events.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
