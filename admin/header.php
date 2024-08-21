<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Coast Academy® - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        html {
            font-size: 12px;
        }
        body {
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
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
            width: 50px;
            margin-right: 10px;
        }
        .navbar-brand h3 {
            font-size: 1.5rem;
            margin: 0;
        }
        .navbar-nav {
            margin-left: auto;
            display: flex;
            align-items: center;
        }
        .nav-item {
            margin-left: 20px;
        }
        .nav-link {
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
        }
        .nav-link:hover {
            color: #ddd;
        }
        .user-info {
            display: flex;
            align-items: center;
            color: #fff;
        }
        .user-info i {
            font-size: 1.7rem;
            margin-right: 10px;
        }
        .user-info span {
            font-size: 1.1rem;
        }
        .container {
            padding: 20px;
        }
        .container h2 {
            margin-top: 20px;
            font-size: 2.5rem;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            margin-bottom: 30px;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-footer {
            padding: 20px;
            background: #f4f4f9;
            text-align: right;
            font-size: 1.1rem;
        }
        .card-footer a {
            text-decoration: none;
            color: #e070dd;
            font-weight: bold;
            transition: color 0.3s;
            padding: 5px;
        }
        .card-footer a:hover {
            color: #671470;
        }
        .footer {
            background-color: #671470;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .credit {
            font-size: 1rem;
            margin: 0;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../images/RCALogo.png" alt="Royal Coast Academy Logo">
                <h3>Royal Coast Academy
                <br>Online Portal</h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- User Info -->
                    <li class="nav-item">
                        <div class="user-info">
                            <i class="fas fa-user-circle"></i>
                            <span>Hello,  <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../auth/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="footer">
        <div class="credit">
            <p>&copy; <?php echo date("Y"); ?> Royal Coast Academy®. All Rights Reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
