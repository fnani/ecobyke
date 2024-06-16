<?php
// Mendapatkan nama halaman saat ini
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>


<html>

<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="index.php" class="navbar-brand p-0">
        <h1 class="m-0">ecobyke</h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto py-0">
            <a href="index.php" class="nav-item nav-link <?php if($activePage == 'index') echo 'active'; ?>">Home</a>
            <a href="about.php" class="nav-item nav-link <?php if($activePage == 'about') echo 'active'; ?>">About</a>
            <a href="bikes.php" class="nav-item nav-link <?php if($activePage == 'bikes') echo 'active'; ?>">Bikes</a>
            <a href="rental.php" class="nav-item nav-link <?php if($activePage == 'rental') echo 'active'; ?>">Rental</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle <?php if($activePage == 'team' || $activePage == 'testimonial') echo 'active'; ?>" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu m-0">
                    <a href="team.php" class="dropdown-item <?php if($activePage == 'team') echo 'active'; ?>">Our Team</a>
                    <a href="testimonial.php" class="dropdown-item <?php if($activePage == 'testimonial') echo 'active'; ?>">Testimonial</a>
                </div>
            </div>
            <a href="contact.php" class="nav-item nav-link <?php if($activePage == 'contact') echo 'active'; ?>">Contact</a>
        </div>
        <?php
        


// Mulai sesi
session_start();

        // Periksa apakah pengguna sudah login
        if(isset($_SESSION['email'])) {
            
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
            // Jika sudah login, tampilkan tombol dengan email pengguna
            echo '<div class="navbar-nav d-lg-none"><a href="profil.php" class="nav-item nav-link">' .$firstName.' '.$lastName. '</a></div>';
            echo '<a href="profil.php" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">' .$firstName.' '.$lastName. '</a>';
        } else {
            // Jika belum login, tampilkan tombol untuk login
            echo '<div class="navbar-nav d-lg-none"><a href="login.php" class="nav-item nav-link">Login</a></div>';
            echo '<a href="login.php" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Get Started</a>';
        }
        ?>
    </div>
</nav>

</html>        
            

