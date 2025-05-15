<?php
$servername = "localhost";
$username = "root"; // sesuaikan
$password = "";     // sesuaikan
$dbname = "restaurant";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$name = $_POST['name'];
$menu = $_POST['menu'];
$quantity = $_POST['quantity'];

// Simpan ke database
$sql = "INSERT INTO orders (name, menu, quantity) VALUES ('$name', '$menu', $quantity)";

if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.php"); // Redirect ke dashboard setelah pesan
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
