<!DOCTYPE html>
<html lang="en">
    <head>
        <meta chareset="UTS-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/register.css">
        <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <title>Newsfeed</title>
    </head>
<body>
<div class="main-event">
    <div class="container">
        <h2>Registration</h2>
        <div class="signup">
        <form action="register_process.php" method="POST">
            <input type="text" name="username" id="username" placeholder="Username" required>
            <input type="password" name="password" id="password" placeholder="Password" required>

            <label for="role">Select Role</label>
            <select name="role" id="role">
                <option value="student">Student</option>
                <option value="admin">President</option>
                <option value="dean">Dean</option>
                <option value="staff">VPAA</option>
            </select>
            <div id="secret-code-field" style="display: none;">
                <label for="secret_code" style="font-size: 0.9rem;">Secret Code (for admin only)</label>
                <input type="text" name="secret_code" id="secret_code" placeholder="Enter secret code">
            </div>

            <button type="submit">Register</button>
        </form>
        <div class="login-link" style="font-size:1rem; text-align:center; color: white; ">
            Already have an account? <a href="login.php">Login</a>
        </div>
    </div>
        </form>
        </div>
        <!-- New field for the secret code -->
        

    <script>
        // JavaScript to show/hide the secret code field based on role selection
        const roleSelect = document.getElementById("role");
        const secretCodeField = document.getElementById("secret-code-field");

        roleSelect.addEventListener("change", () => {
            const selectedRole = roleSelect.value;
            secretCodeField.style.display = (selectedRole === "admin") ? "block" : "none";
        });
    </script>
    </div>
</div>
</body>
</html>