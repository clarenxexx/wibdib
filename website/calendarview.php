<header>
    <h1 id = 'title'>PYORG CALENDAR</h1>
    <hr>
</header>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style> 
#title {
  background-color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 10vh;
  margin: 0;
}


body {
    background-color: white;
}

table {
    width: 100%;
    color: green;
    background-color: white;
}

td, th {
    width: 14%;
    padding: 3em;
    border: 1px solid green;
    text-align: center;
    
}

#goback{
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 50px; /* Adjust this value as per your desired height */
  background-color: lightgreen;
  font-size: 32;
  font-weight: bold;
  border-color: black;
}

</style>

</head>
<body>
    <div id="main">
        <form action="calendarprocess.php" id="loginform">
            <button id="goback" name="user_role" id="user_role" value="<?php echo isset($_SESSION['role']) ? $_SESSION['role'] : ''; ?>">Return</button>
        </form>
    </div>

    <script>
// JavaScript to dynamically redirect based on user role
    document.getElementById('loginform').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting
    var userRole = document.getElementById('user_role').value;
    
    if (userRole === 'student') {
        window.location.href = 'student_main.php';
    } else if (userRole === 'admin') {
        window.location.href = 'admin.php';
    } else if(userRole ==='dean'){
        window.location.href = 'homepage.php'
    } else {
        // Handle other roles or unknown roles
        alert('Unknown user role');
    }
});
</script>
</body>
</html>

<?php
$month = date('m');
$year = date('Y');

$daysInMonth = date('t');
$firstDayOfMonth = date('N', mktime(0, 0, 0, $month, 1, $year));

echo "<table>";
echo "<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>";

$currentDay = 1;

echo "<tr>";
// Pad the first week if necessary
for ($i = 1; $i < $firstDayOfMonth; $i++) {
    echo "<td></td>";
}

for ($dayOfWeek = $firstDayOfMonth; $dayOfWeek <= 7; $dayOfWeek++) {
    echo "<td>$currentDay";

    // Fetch events for the current day from the database and display them
    $events = getEventsFromDatabase($year, $month, $currentDay);
    foreach ($events as $event) {
        echo "<br><span style='color: red;'>{$event['title']}</span>";
        // You can customize the way you display event information
    }

    echo "</td>";
    $currentDay++;
}

while ($currentDay <= $daysInMonth) {
    echo "<tr>";
    for ($dayOfWeek = 1; $dayOfWeek <= 7 && $currentDay <= $daysInMonth; $dayOfWeek++) {
        echo "<td>$currentDay";

        // Fetch events for the current day from the database and display them
        $events = getEventsFromDatabase($year, $month, $currentDay);
        foreach ($events as $event) {
            echo "<br><span style='color: red;'>{$event['title']}</span>";
            // You can customize the way you display event information
        }

        echo "</td>";
        $currentDay++;
    }
    echo "</tr>";
}

echo "</table>";

// Function to retrieve events from the database for a specific day
function getEventsFromDatabase($year, $month, $day) {
    $conn = mysqli_connect("localhost", "johnreiaris", "12345", "events");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $date = "$year-$month-$day";
    $sql = "SELECT * FROM events WHERE DATE(upload_time) = '$date'";
    $result = mysqli_query($conn, $sql);

    $events = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $events[] = $row;
    }

    mysqli_close($conn);

    return $events;
}
?>
<hr>
<br> <br> <br>