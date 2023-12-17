<?php
$conn = mysqli_connect("localhost", "johnreiaris", "12345", "events");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM events WHERE status = 'approved'";
$result = mysqli_query($conn, $sql);
?>

<div class="feed">
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <div class="event">
        <h3><?php echo $row['title']; ?></h3>
        <p><?php echo $row['description']; ?></p>
        <img src="<?php echo $row['picture']; ?>" alt="Event Picture" width="300">
    </div>
    <?php endwhile; ?>
</div>

<?php
mysqli_close($conn);
?>
<style>
    .feed {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .event {
        width: 80%;
        margin: 20px 0;
        padding: 10px;
        background-color: #f4f4f4;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .event h3 {
        font-size: 24px;
        margin: 10px 0;
    }

    .event p {
        font-size: 16px;
    }

    .event img {
        max-width: 100%;
    }
</style>
