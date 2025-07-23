<?php include 'db.php';

// Handle form tambah data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $conn->query("INSERT INTO users (name, email) VALUES ('$name', '$email')");
    header("Location: index.php");
    exit;
}

// Ambil semua data
$result = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<head><title>Simple CRUD</title></head>
<body>
<h2>Tambah User</h2>
<form method="POST">
    Nama: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    <button type="submit">Simpan</button>
</form>

<h2>Daftar User</h2>
<table border="1" cellpadding="5">
    <tr><th>ID</th><th>Nama</th><th>Email</th><th>Aksi</th></tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus user ini?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
