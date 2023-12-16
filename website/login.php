<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta chareset="UTS-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <title>Newsfeed</title>
    </head>
    
    <body>
    <div class="container">
        <div class="main-event">
        <div class="login">
        <form action="homepage.php" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" required>
            <input type="password" name="password" id="password" placeholder="Password" required>

            <button type="submit">Login</button>
            <a href="register.php">Don't have an account yet?</a>
        </form>
        </div>

</body>
</html>
