<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Coast Academy®</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #fff;
            color: #671470;
            overflow: hidden;
        }

        .navbar {
            background-color: #671470;
            color: #fff;
            padding: 10px 20px;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            color: #fff;
        }
        .navbar-brand img {
            width: 50px; /* Adjust as needed */
            margin-right: 10px;
        }
        .navbar-brand h3 {
            margin: 0;
            font-size: 1.3rem;
        }
        .navbar-nav {
            margin-left: auto;
        }
        .nav-item {
            margin-left: 20px;
        }
        .footer {
            background-color: #671470;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            max-height: 50px;
        }
        .credit {
            /* margin-top: 20px; */
            font-size: 0.8rem;
            position: relative;
            right: 9px;
            top: 0;
            margin: 10px 0;
        }
        .register-container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            color: #000;
            position: relative;
            padding: 50px 25px;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            width: 50px; /* Adjust the width as needed */
            height: auto;
        }
        .error-message {
            color: red;
            display: block;
            margin-bottom: 10px;
        }
        .password-container {
            position:relative;
        }
        .password-container i {
            position: absolute;
            color: #666;
            margin-top: 15px;
            opacity: 0.4;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        @media (max-width: 480px) {
            .register-container {
                padding: 50px 40px;
                margin: 100px 30px;
            }
            .navbar-brand img {
                width: 50px; /* Adjust as needed */
                margin-right: 10px;
            }
            .navbar-brand h3 {
                margin: 0;
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <img src="../images/RCALogo.png" alt="logo">
                <h3>Royal Coast Academy<br>Online Portal</h3>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="color: #fff; text-decoration:none">Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="register-container">
        <h2 class="text-center">Register</h2>
        <form action="register_script.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group password-container">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <i class="fas fa-eye toggle-password" id="togglePassword"></i>
            </div>
            <div class="form-group password-container">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm_password" required>
                <i class="fas fa-eye toggle-password" id="toggleConfirmPassword"></i>
            </div>
            <div class="form-group">
                <label for="key">Authorisation Key:</label>
                <input type="text" class="form-control" id="key" name="key" placeholder="Enter Key" required>
            </div>

            <div class="error-message" id="errorMessage">
                <?php
                if (isset($_SESSION['error_message'])) {
                    echo htmlspecialchars($_SESSION['error_message']);
                    unset($_SESSION['error_message']); // Clear the error message
                }
                ?>
            </div>
            <label><a href="login.php">Sign In</a></label>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
    </div>

    <div class="footer">
        <div class="credit">
            <p>Copyright &copy; <?php echo date("Y");?> Royal Coast Academy.</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        $('#togglePassword').on('click', function() {
            const passwordField = $('#password');
            const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', type);
            $(this).toggleClass('fa-eye fa-eye-slash');
        });

        $('#toggleConfirmPassword').on('click', function() {
            const confirmPasswordField = $('#confirm-password');
            const type = confirmPasswordField.attr('type') === 'password' ? 'text' : 'password';
            confirmPasswordField.attr('type', type);
            $(this).toggleClass('fa-eye fa-eye-slash');
        });

        // Hide error message after 3 seconds
        $(document).ready(function() {
            const errorMessage = $('#errorMessage');
            if (errorMessage.text().trim() !== '') {
                setTimeout(function() {
                    errorMessage.fadeOut();
                }, 3000); // 3 seconds
            }
        });
    </script>
</body>
</html>
        