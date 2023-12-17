<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$allowedRoles = ["admin", "dean", "staff", "upress"];


if (!in_array($_SESSION['role'], $allowedRoles)) {
    header("Location: login.php");
    exit;
}

$conn = mysqli_connect("localhost", "johnreiaris", "12345", "events");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM events WHERE status = 'pending'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>

        
body{
    min-height: 100vh;
    width: 100%;
    background-image: linear-gradient(5deg, rgba(2,0,36,1) 0%, rgba(9,121,51,0.44368912337662336) 100%, rgba(0,212,255,1) 100%), url("../img/bg1.jpg");
    background-size: cover;
    background-position: center;
    box-sizing: border-box;
    overflow-x: hidden;
}

        h1 {
            width: 100%;
            border-radius: 10px;
            background: #e6d4b0;
            color: black; 
            margin: 0;
            padding: 10px 0;
            text-align: center;
        }
        .cont{
            
        display: flex;
        justify-content: center;
        align-items: top;
        height: 60px;
        }
    
        .content-container {
            background-color: #d5cbb3; 
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
        }

    
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
            background: #e2cea5;
        }

        th, td {
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }

      
        th {
            background: #a18d58;
            color: black; 
        }

        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        
        a {
            text-decoration: none;
            background: #a18d58;
            color: black; 
            padding: 5px 10px;
            border-radius: 5px;
        }

        a:hover {
            background-color: white; 
        }
    </style>
</head>
<body>
    <div class="cont">
        <h1>Manage Pending Events</h1>
    </div>
    <div class="content-container">
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Picture</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><img src="<?php echo $row['picture']; ?>" alt="Event Picture" width="100"></td>
                <td>
                    <a href="approve_event.php?id=<?php echo $row['id']; ?>">Approve</a>
                    <a href="decline_event.php?id=<?php echo $row['id']; ?>">Decline</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
