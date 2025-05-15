<?php
session_start();

// Data login admin (hardcoded)
$admin_username = 'admin';
$admin_password = 'admin123'; // password admin

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah username dan password cocok
if ($username === $admin_username && $password === $admin_password) {
    $_SESSION['admin'] = $username; // Set session admin
    header('Location: admin_dashboard.php');
} else {
    echo "Login gagal! <a href='login.html'>Coba lagi</a>";
}
?>
