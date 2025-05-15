<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Kalau ada yang klik tombol selesai
if (isset($_GET['done'])) {
    $id = $_GET['done'];
    $conn->query("UPDATE orders SET status='done' WHERE id=$id");
}

// Ambil data pending
$pending = $conn->query("SELECT * FROM orders WHERE status='pending'");

// Ambil data done
$done = $conn->query("SELECT * FROM orders WHERE status='done'");
?>

<h1>Daftar Pesanan</h1>
<table border="1">
    <tr>
        <th>Nama</th>
        <th>Menu</th>
        <th>Jumlah</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $pending->fetch_assoc()) { ?>
    <tr>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['menu']); ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><a href="?done=<?php echo $row['id']; ?>">Selesai</a></td>
    </tr>
    <?php } ?>
</table>

<h1>Pesanan Selesai</h1>
<table border="1">
    <tr>
        <th>Nama</th>
        <th>Menu</th>
        <th>Jumlah</th>
    </tr>
    <?php while ($row = $done->fetch_assoc()) { ?>
    <tr>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['menu']); ?></td>
        <td><?php echo $row['quantity']; ?></td>
    </tr>
    <?php } ?>
</table>

<?php $conn->close(); ?>
