<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Ambil data user dari session
$username = $_SESSION['username'];
$role = $_SESSION['role'];
$isAdmin = ($role === 'admin');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* General Body Styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('assets/images/foto1.jpg');
            background-size: cover; 
            background-position: center center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Container for the whole page */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Dashboard Form Container */
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            text-align: center;
        }

        /* Heading */
        h2 {
            font-size: 30px;
            color: #333;
            margin-bottom: 20px;
        }

        .welcome-message {
            margin-bottom: 30px;
        }

        /* Button Styling */
        .logout-btn, .admin-btn, .user-btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .admin-btn:hover, .user-btn:hover {
            background-color: #0056b3;
        }

        .logout-btn {
            background-color: red;
        }

        .logout-btn:hover {
            background-color: #8B0000;
        }

        /* Admin Panel Styling */
        .admin-panel {
            background-color: #e9f7fd;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .admin-panel h3 {
            font-size: 24px;
            color: #007bff;
            margin-bottom: 15px;
        }

        /* User Panel Styling */
        .user-panel {
            margin-top: 30px;
        }

        .user-panel p {
            font-size: 18px;
            color: #555;
        }

        .admin-btn, .user-btn {
            margin: 8px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }

            .welcome-message p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Selamat Datang</h2>
            <div class="welcome-message">
                <p>Halo, <?= htmlspecialchars($username) ?></p>
                <p>Role: <?= htmlspecialchars($role) ?></p>
                <p>Anda telah berhasil login ke sistem.</p>
            </div>

            <?php if ($isAdmin): ?>
            <!-- Admin Panel -->
            <div class="admin-panel">
                <h3>Admin Panel</h3>
                <a href="#" class="admin-btn">Kelola User</a>
                <a href="#" class="admin-btn">Lihat Log</a>
                <a href="#" class="admin-btn">Pengaturan</a>
            </div>
            <?php else: ?>
            <!-- User Panel -->
            <div class="user-panel">
                <p>Selamat datang di dashboard user.</p>
                <a href="#" class="user-btn">Profil Saya</a>
                <a href="#" class="user-btn">Ubah Password</a>
            </div>
            <?php endif; ?>

            <!-- Logout Button -->
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
</body>
</html>