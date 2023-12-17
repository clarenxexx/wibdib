<?php
// Move session_start() to the top
session_start();

// Rest of your code...
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Homepage-PyOrg</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="css/hompagecss.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@500&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">\
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css");

*{
    margin: 0;
    padding: 0;
    font-family: 'Noto Sans', sans-serif;
}
body{
    min-height: 100vh;
    width: 100%;
    background-image: linear-gradient(5deg, rgba(2,0,36,1) 0%, rgba(9,121,51,0.44368912337662336) 100%, rgba(0,212,255,1) 100%), url("img/bg1.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    box-sizing: border-box;
    overflow-y: auto;
    display: flex;
}
#nav{
    background: #EDF1D6;
    position: relative;
    text-align: center;
    z-index: 2;
    width: 2140px;

}

#nav ul{
    display: inline-flex;
    list-style: none;
    color: #000000;
    width: 100%;
    margin-left: 150px;


}

/*style="display: none; max-height: 350px; visibility:hidden; transform: translate(-50%, -50%) scale(0.1); min-height: 300px; background-color: gray; margin: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);"*/

.action-button{
    height: 30px;
    width: 120px;
    outline: none;
}
#nav ul li{
    width: 13   0px;
    margin: 15px;
    padding: 5px;
    
}
#nav ul li a{
    text-decoration: none;
    text-align: center;
    color: #000000;
}
.active, #nav ul li:hover{
    background: #DBDFC0;
    border-radius: 3px;
}
.sub-menu{
    text-align: left;
    display: none; 
}
#nav ul li:hover .sub-menu{
    display: block;
    position: absolute;
    background-color: #EDF1D6;
    margin-top: 15px;
    margin-left: -15px;
}
#nav ul li:hover .sub-menu ul{
    display: block;
    margin: 10px;
}
#nav ul li:hover .sub-menu ul li{
    width: 150px;
    padding: 10px;
    background-color: transparent;
}
#nav ul li:hover .sub-menu ul li a:hover{
    color: #DBDFC0;
}
#nav .fa-arrow-right{
    float: right;
}
.menu-orgs{
    display: none;
}
.logo h1{
    margin-top: -60px;
    margin-left: 15px ;
    float: left;
}
.icon {
    width: 100px;
    float: right;
    margin-right: 150px;
    margin-top: -60px;
}
.bi.bi-envelope{
    color: #000000;
    font-size: 2rem;
}


/*main content*/
.content{
    display: flex;
}
.content .wrapper{
    display: flex;
    flex-direction: row;
    position: relative;
    width: 100%;
    min-height: 10px;
    flex-wrap: wrap;
    padding: 30px;
    margin-top: 5px;
}
.wrapper .card{
    background-color: #DBDFC0;
    width: 300px;
    position: relative;
    height: 50;
    margin: 30px 10px;
    padding: 20px 15px;
    box-shadow: 0.5px 5px #000000;
    transition: 0.3s ease-in-out;
    margin-top: 5%;
}
.card a{
    background-color: #000000;
    color: #fff;
    padding: 15px 20px;
    display: block;
    text-align: left;
    margin-top: 80px;
    min-block-size: 20px;
}
.content .main {
    z-index: 2;
    margin-top: 22px;
    display: flex;
    position: relative;
    background-color: #d5cbb3;
    width: 100%; /* Adjust the width as needed */
    max-width: 1000px; /* Set a maximum width if needed */
    left: -140px;
    border-style: ridge;
    border-color: #000000;
    padding: 15px;
    justify-content: center;
    align-items: center;
    /* height: 1000px; Remove or adjust the height */
}
#file-upload-button{
    background: transparent;
}

.main #event-show{
    display: none;
}

#upload-event-button {
            right: 40px;
            background-color: #187529;
            color: #fff;
        }

        #pending-events-button {
            right: 180px; /* Adjust the position as needed */
            background-color: #187529; /* Orange button color */
            color: #fff;
        }

        #open-calendar {
            right: 320px;
            background-color: #187529;
            color: #fff;
        }

        #event-upload-form {
            display: none;
        }
        #pending-events {
        display: none;
        padding: 20px;
        text-align: center;
        justify-content: center;
        margin-left: 400px;
        width: 500px;
        height: 500px;
        background: transparent;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        color: white;
        }

        #pending-events h2 {
        font-size: 2rem;
        color: orangered;
        margin-bottom: 10px;
        }
        /*#pending-events img{
            width: 90px;
            height: 90px;
            margin-top: -10px;
        }*/

        #pending-events table {
        width: 100%;
        border-collapse: collapse;
        }

        #pending-events .tableth {
        width: 100%;
        margin-top: 30px;
        }

        #pending-events table th, #pending-events table td {
        border: 3px solid #ccc;
        padding: 10px;
        text-align: left;
        }

        #pending-events table th {
        background:transparent;
        }

        #pending-events table img {
        max-width: 100px;
        height: auto;
        }         

        #logout-button {
            right: 460px; /* Adjust the position as needed */
            background-color: #187529; /* Orange button color */
            color: #fff;
        }

        .scrollable-container {
    height: 300px;
    overflow: auto;
}
        
        
#upload-event-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #187529; 
            color: #fff; 
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        #upload-event-button:hover {
            background-color: #149224; 
        }

        
        #event-upload-form {
            background-color: #fff; 
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: none;
        }

        #approved-events {
            background-color: #fff; 
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        
        .manage-events-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #2ecc71; 
            color: #fff; 
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .manage-events-button:hover {
            background-color: #149224; 
        }




    </style>
</head>
<body>
    <div class="main-nav">
        <section id="header">
            
            <nav id="nav" style="z-index: 3;">
                <ul>
                    <li>
                        <div class="container">
                        <h1 id="logo"><a href="index.html">PY-ORG</a></h1>
                        </div>
                    </li>
                    <li><a href="">Newsfeed</a></li>
                    <li>
                        <a href="#">Administration</a>
                        <div class="sub-menu">
                            <ul>
                                <li><a href="#">Faculty</a></li>
                                
                            </ul>
                        </div>
                    </li>
                    <li><a href="#">About Us</a></li>
                    <li>
                        <a href="/website/calendarview.php">PyOrg Calendar</a>
                    </li>
                    <li>
                        
                <button id="upload-event-button" class="action-button">Upload an event</button>
                    </li>
                    <li>
                <button id="pending-events-button" class="action-button">Pending Events</button>

                    </li>
                    <li>
                        <a class="manage-events-button" href="manage_events.php">Manage Events</a>
                    </li>
                    <li>
                        <a href = "/website/login.php"> <button id="signout-button" class="action-button">Sign Out</button></a>
                    </li>
                </ul>
            </nav>
        </section>
        <!-----Contents----->
            
            <div id="bruh" class="content">
                
                <div class="main">
                    <div id="event-upload-form" style="z-index:1; justify-content: center; align-items: center; display: none; max-height: 350px; min-height: 300px; background-color: #EDF1D6; margin: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                        <form action="homepage.php" method="POST" enctype="multipart/form-data">
                            <label for="name" name="main" style="font-size: 2rem; text-align: center; display:flex; justify-content:center;">Upload Event</label>

                            <label for="title">Event Title</label>
                            <input type="text" name="title" id="title" required style="width: 90%; padding: 10px; margin-bottom: 10px; border-radius:6px;">

                            <label for="description">Event Description</label>
                            <textarea name="description" id="description" required style=" border-radius:6px; width: 90%; padding: 10px; margin-bottom: 10px;"></textarea>
                            <br><br>
                            <label for="picture">Event Picture</label> <br>
                            <input type="file" name="picture" id="picture" accept="image/*" required style="margin-bottom: 10px; height: 50px; width: auto;"> <br>

                            <button type="submit" name="submit" style="background-color: #187529; color: #fff; padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer;">Upload Event</button>
                        </form>
                    </div>
                </div>
            </div>

   
            <div id="pending-events">
        <?php   



        $posts = array();

        function addPost($newPost) {
            global $posts;
            $timestamp = time();
            $posts[$timestamp] = $newPost;
        }

        

        if ($_SESSION['role'] === 'admin') {
        

            $studentUsername = $_SESSION['username']; 
            $conn = mysqli_connect("localhost", "johnreiaris", "12345", "events");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $pendingEventsSql = "SELECT * FROM events WHERE status = 'pending' AND user_id = (SELECT id FROM users WHERE username = '$studentUsername')";
            $pendingEventsResult = mysqli_query($conn, $pendingEventsSql);

            if (mysqli_num_rows($pendingEventsResult) > 0) {
                echo '<h2>Pending Events</h2>';

                while ($event = mysqli_fetch_assoc($pendingEventsResult)) {
                    

                    $imagePath = $event['picture'];


                    echo '
                    <table class="tableth">
                    <tr>
                    <th colspan="2" style="text-align: center; font-size: 24px;">Title</th>
                    </tr>
                    <tr>
                    <td colspan="2" style="text-align: center; font-size: 18x;">' . $event['title'] . '</td>
                    </tr>
                    </table>';
                    
                    echo '
                    <table>
                    <tr>
                    <th colspan="2" style="text-align: center; font-size: 24px;">Description</th>
                    </tr>
                    <tr>
                    <td colspan="2" style="text-align: center; font-size: 18x;">' . $event['description'] . '</td>
                    </tr>
                    </table>';

                    echo '
                    <table>
                    <tr>
                    <th colspan="2" style="text-align: center; font-size: 24px;">Date Posted</th>
                    </tr>
                    <tr>
                    <td colspan="2" style="text-align: center; font-size: 18x;">' . $event['upload_time'] . '</td>
                    </tr>
                    </table>';

    
                    echo '';
                    echo '';

                }
                echo '</table>';
            } else {
                echo 'No pending events found for ' . $studentUsername;
            }
            mysqli_close($conn);
        } else {
            echo 'You do not have permission to view pending events.';
        }
        ?>
    </div>



            </div>


<div id="approved-events">
    <?php include('approved_events.php'); ?>
</div>


<script>
const uploadEventButton = document.getElementById("upload-event-button");
const pendingEventsButton = document.getElementById("pending-events-button");
const eventUploadForm = document.getElementById("event-upload-form");
const pendingEventsContainer = document.getElementById("pending-events");
const approvedEventsContainer = document.getElementById("approved-events");
const bbbb =document.getElementById("bruh");


eventUploadForm.style.display = "none";
pendingEventsContainer.style.display = "none";
approvedEventsContainer.style.display = "block";


uploadEventButton.addEventListener("click", () => {
    eventUploadForm.style.display = "block";
    pendingEventsContainer.style.display = "none";
    approvedEventsContainer.style.display = "none";
    bbbb.style.display="block";


});

pendingEventsButton.addEventListener("click", () => {
    eventUploadForm.style.display = "none";
    pendingEventsContainer.style.display = "block";
    approvedEventsContainer.style.display = "none";
    bbbb.style.display = "none";

});


</script>



</body>
</html>