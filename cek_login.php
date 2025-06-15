<?php
session_start();

// Data login Namamu (hardcoded)
$namamu_username = 'Namamu';
$admin_password = 'admin123'; // password admin

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah username dan password cocok
if ($username === $namamu_username && $password === $namamu_password) {
    $_SESSION['namamu'] = $username; // Set session namamu
    header('Location: namamu_dashboard.php');
} else {
    echo "Login gagal! <a href='login.html'>Coba lagi</a>";
}
?>
