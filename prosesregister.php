<?php
session_start();
include "koneksi.php";

// Dapatkan data user dari form register
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];
$level = $_POST['level'];

// Validasi jika password & password_confirmation sama
if ($password != $password_confirmation) {
    $_SESSION['error'] = 'Password yang anda masukkan tidak sama dengan password confirmation.';
    header("Location: register.php");
    exit(); // Ensure script stops execution after redirection
}

// Check if the email is already registered
$emailCheckQuery = mysqli_query($koneksi, "SELECT * FROM masuk WHERE email = '$email'");
if (mysqli_num_rows($emailCheckQuery) > 0) {
    $_SESSION['error'] = 'Email sudah terdaftar. Silakan gunakan email lain.';
    header("Location: register.php");
    exit(); // Ensure script stops execution after redirection
}

// Insert the new user into the database
$query = mysqli_query($koneksi, "INSERT INTO masuk (firstName, lastName, email, password, level) VALUES ('$firstName', '$lastName', '$email', '$password', 'user')");

// Check if the insertion was successful
if ($query) {
    $_SESSION['message'] = 'Registrasi berhasil. Silakan login.';
    header("Location: register.php");
} else {
    $_SESSION['error'] = 'Terjadi kesalahan saat registrasi. Silakan coba lagi.';
    header("Location: register.php");
}

?>
