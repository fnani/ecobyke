<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];

// lakukan sanitasi input untuk mencegah SQL injection
$email = mysqli_real_escape_string($koneksi, $email);
$password = mysqli_real_escape_string($koneksi, $password);


// menyeleksi data user dengan email dan password yang sesuai
$login = mysqli_query($koneksi, "SELECT * FROM masuk WHERE email='$email' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah email dan password di temukan pada database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if ($data['level'] == "admin") {
        // buat session login dan email
        $_SESSION['email'] = $email;
        $_SESSION['level'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:admin/index.php");
    } else if ($data['level'] == "user") {
        // buat session login dan email
        $_SESSION['email'] = $email;
        $_SESSION['level'] = "user";
        // alihkan ke halaman dashboard user
        header("location:index.php");
    } else {
        // alihkan ke halaman login kembali dengan pesan gagal
        $_SESSION['error'] = 'password yang anda masukan salah. Silakan coba lagi.';
    header("Location: login.php");
    }
} else {
    // alihkan ke halaman login kembali dengan pesan gagal
    $_SESSION['error'] = 'Email dan password yang anda masukan salah. Silakan coba lagi.';
    header("Location: login.php");
}
?>
