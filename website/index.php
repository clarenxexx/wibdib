<!DOCTYPE html>
<html lang="en">
    <head>
        <meta chareset="UTS-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <title>PyOrg</title>
    </head>
    <body>
        <section class="header">        
            <nav>
                <img src="img/CCS Logo.png">
                <div class="nav-links" id="navLinks">
                    <i class="fa fa-times" onclick="hideMenu()"></i>
                    <ul>                            
                        <li><a href="login.php" target="_self">Sign In</a></li>
                        <li><a href="register.php">Don't have an account yet?</a></li>
                    </ul>
                </div>
                <i class="fa fa-bars" onclick="showMenu()"></i>
            

            </nav>
    <div class="text-box">
        <h1>Py-Org</h1>
        <h2>Western Mindanao State University</h2>
    </div>
        </section>

        <script>
            var navLinks=document.getElementById("navLinks");
                function showMenu(){
                  navLinks.style.right = "0"
                }
                function hideMenu(){
                    navLinks.style.right = "-200px"
                }            
        </script>
        
    </body>
</html>

