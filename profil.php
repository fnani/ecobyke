<?php
// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit;
}

// Menghubungkan ke database
include 'koneksi.php';

// Ambil informasi pengguna dari sesi
$email = $_SESSION['email'];

// Query untuk mengambil informasi pengguna dari database
$query = "SELECT * FROM masuk WHERE email = '$email'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $firstName = $user['firstName'];
    $lastName = $user['lastName'];
    $email = $user['email'];
    $password = $user['password'];
} else {
    // Jika data pengguna tidak ditemukan, lakukan tindakan sesuai kebijakan aplikasi Anda
    echo "Data pengguna tidak ditemukan.";
    exit;
}

// Proses edit profil jika ada data yang dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newFirstName = $_POST['firstName'];
    $newLastName = $_POST['lastName'];
    $newPassword = $_POST['password'];

    // Update informasi pengguna ke database
    $updateQuery = "UPDATE masuk SET firstName = '$newFirstName', lastName = '$newLastName', password = '$newAddress' WHERE email = '$email'";
    $updateResult = mysqli_query($koneksi, $updateQuery);

    if ($updateResult) {
        // Jika update berhasil, update juga data di sesi
        $_SESSION['firstName'] = $newFirstName;
        $_SESSION['lastName'] = $newLastName;
        $_SESSION['address'] = $newAddress;
        // Redirect kembali ke halaman profil
        header("Location: profil.php");
        exit;
    } else {
        echo "Gagal mengupdate profil. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Masukkan stylesheet atau CSS tambahan di sini -->
</head>

<body>
    <h1>Profile</h1>
    <p>Name : <?php echo $firstName.' '.$lastName; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <br>
    <a href="change_password.php">Ganti Password</a> <!-- Tautan untuk halaman ganti password -->
    <a href="logout.php">logout</a>
</body>

</html>
