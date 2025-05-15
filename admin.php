<?php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header('Location: login.html');
    exit;
}

// Dummy data pemesanan (nanti bisa sambung database)
$pemesanan = [
    ['nama' => 'Andi', 'menu' => 'Strawberry Paradise Cake', 'jumlah' => 2],
    ['nama' => 'Budi', 'menu' => 'Tiramisu Cake', 'jumlah' => 1],
    ['nama' => 'Citra', 'menu' => 'Manggo Cream Cake', 'jumlah' => 3],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Dashboard Admin</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nama Pembeli</th>
                <th>Menu</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pemesanan as $pesanan): ?>
            <tr>
                <td><?= htmlspecialchars($pesanan['nama']) ?></td>
                <td><?= htmlspecialchars($pesanan['menu']) ?></td>
                <td><?= htmlspecialchars($pesanan['jumlah']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><a href="logout.php">Logout</a></p>
</body>
</html>
