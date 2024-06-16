<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bikes Ecobyke</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="shortcut icon" href="img/logo.png" type="image/png" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
         .panjang {
            position: relative;
            margin-top: -15%;
        }

        .table-box-shadow {
            box-shadow: 0px 2px 5px rgba(3, 18, 26, 0.15);
            border-radius: 7px;
        }

        .img-thumb {
            width: 100%;
            border-radius: 7px;
        }

        .text-judul {
            color: #007bff;
        }

        .product-info {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            font-size: 0.9rem;
            color: rgb(104, 113, 118);
        }

        .product-info div {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .product-info i {
            color: #6f42c1;
        }
    </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
<?php include "header.php" ?>
    <div class="container-xxl py-5 bg-primary">
        <div class="container my-5 py-5 px-lg-5">
        </div>
    </div>
        <!-- Navbar & Hero End -->

        <!-- Bikes Start -->
        <div class="container-xxl py-5" id="bikes">
            <div class="container py-5 px-lg-5">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- tabel panjang -->
                    <div class="row panjang">
                        <div class="col-lg-12 mb-4">
                            <div class="card position-relative table-box-shadow">
                                <div class="card-body">
                                    <h3 class="card-title">Informasi Penting</h3>
                                    <p>Informasi penting terkait pemesanan dan penyewaan sepeda.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Image and Detail Produk -->
                        <div class="col-lg-8 mb-4">
                        <?php
                            // sepeda
                            include "koneksi.php";
                            $kode=$_GET['kode'];
                            $query=mysqli_query($koneksi,"select * from tb_sepeda 
                            where kode = '$kode'");
                            $row = mysqli_fetch_assoc($query);
                            $gambar = $row['gambar'];
                            $harga = $row['harga'];

                            // user
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
                                $id_user = $user['id_user'];
                            }
                        ?>
                            <div class="card position-relative table-box-shadow">
                                <div class="card-body">
                                    <div class="table-responsive mb-0">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td style="width: 44%;">
                                                    <?php
                                                        echo '<img src="sepeda/'.$gambar.'" class="img-fluid w-100" alt="">';
                                                    ?>
                                                </td>
                                                <td style="width: 60%;">
                                                    <table class="table table-borderless">
                                                        <tbody>
                                                            <h2 class="fs-6 bs-dark display-1"><?php echo $row['merek'] ?></h2>
                                                            <div dir="auto" class="" style="color: rgb(104, 113, 118);"><?php echo $row['tipe'] ?></div>
                                                            <div class="product-info mt-3">
                                                                <div><i class="fa fa-tint fs-7"></i> Warna: <?php echo $row['warna'] ?></div>
                                                                <div><i class="fa fa-check fs-7"></i> Kondisi: Baik</div>
                                                                <div><i class="fa fa-bicycle fs-7"></i> Jenis: <?php echo $row['jenis'] ?></div>
                                                            </div>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- table-2 -->
                                    <div class="table-responsive table-box-shadow mb-4">
                                        <table class="table table-borderless">
                                            <thead>
                                            <div class="mt-3 mb-1 mx-2">
                                                <h5 class="ms-2 fs-5">Panduan Pemesanan</h5>
                                            </div>
                                            </thead>
                                            <tbody>
                                            <div class="product-info ms-3">
                                                <div><i class="fa fa-map-pin fs-5"> </i>Ambil dan kembalikan sepeda di tempat yang sama.</div>
                                               
                                                        <tr>
                                                                <td>
                                                                    <ul>
                                                                        <li class="fs-6 fw-lighter text-dark">Pastikan Anda memiliki KTP dan SIM yang masih berlaku.</li>
                                                                        <li class="fs-6 fw-lighter text-dark">Durasi sewa adalah 24 jam terhitung dari waktu pengambilan.</li>
                                                                    </ul>
                                                                </td>
                                                        </tr>
                                                     </i>
                                                </div>
                                            </div>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- table-2 end -->

                                    <!-- table-3 -->
                                    <div class="table-responsive table-box-shadow">
                                        <table class="table table-borderless p-1">
                                            <thead>
                                            <div class="mt-3 mb-1 mx-2">
                                                <h5 class="ms-2 fs-5">Lokasi Pengambilan Sepeda</h5>
                                            </div>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-8 ms-2" style="margin-right: -3%;">
                                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.2197729677873!2d112.18061397404931!3d-7.766503377031541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785c36eca0aa81%3A0xcb69bf705dbc06dd!2sSMK%20Bhakti%20Mulia%20Pare!5e0!3m2!1sen!2sid!4v1715949169048!5m2!1sen!2sid" width="100%" height="170" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <h5 class="fs-6 ms-2">SMK Bhakti Mulia Pare</h5>
                                                                <p style="font-size: 80%;" class="ms-2">JL. MAYJEN MAS ISMAN, PUHREJO</p>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3">
                                                            <h6>Informasi Tambahan:</h6>
                                                            <p>Hubungi layanan pelanggan kami untuk informasi lebih lanjut mengenai lokasi pengambilan dan pengembalian sepeda, serta syarat dan ketentuan lainnya.</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- table-3 end -->
                                    
                                </div>
                            </div>
                        </div>
                        <!-- hal2 -->
<!-- Harga dan Proses Pemesanan -->
<div class="col-lg-4">

                            <!-- Persyaratan Pemesanan dan Informasi Lain-lain -->
                            <div class="card position-relative table-box-shadow mb-3">
                                <div class="card-header py-1">
                                    <h5 class="mt-2 fs-6">Persyaratan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td scope="row">Persyaratan</td>
                                                    <th>KTP, SIM</th>
                                                </tr>
                                                <tr>
                                                    <td scope="row">Durasi Sewa</td>
                                                    <th>24 Jam</th>
                                                </tr>
                                                <tr>
                                                    <td scope="row">Kontak</td>
                                                    <th>
                                                        <a href="tel:+6281234567890" class="text-judul">+62 812-3456-7890</a>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td scope="row">Alamat</td>
                                                    <th>Jl. Mayjen Mas Isman, Pare</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card position-relative mb-4 table-box-shadow">
                                <div class="card-header py-1">
                                    <h5 class="mt-2 fs-6">Rincian Harga</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <h4 class="fs-6" style="color: rgb(104, 113, 118);">Harga Total</h4>
                                    </div>
                                    <h2 class="fs-5 text-secondary">Rp. <?php echo $harga; ?></h2>
                                    </div>
                                    <div class="d-grid gap-2 col-11 mx-auto mb-3">
<!-- form 2 form 2 form2 form 2 form 2 form 2 form 2 form 2 form2 form 2 form 2 form 2form 2 form 2 form2 form 2 form 2 form 2form 2 form 2 form2 form 2 form 2 form 2-->
                                        <form method="POST" action="buy.php">
                                            <input  style="display: none;" type="text" name="username" value="<?php echo $firstName.' '.$lastName;  ?>" readonly onfocus="this.select();" onmousedown="return false;" onkeydown="return false;">
                                            <input style="display: none;" type="text" name="id_user" value="<?php echo $id_user; ?>" readonly onfocus="this.select();" onmousedown="return false;" onkeydown="return false;">
                                            <input style="display: none;" type="text" name="sepeda" value="<?php echo $row['merek'].' '.$row['jenis'] ?>" readonly onfocus="this.select();" onmousedown="return false;" onkeydown="return false;">
                                            <input style="display: none;" type="text" name="kode" value="<?php echo $kode; ?>" readonly onfocus="this.select();" onmousedown="return false;" onkeydown="return false;">
                                            <input type="submit" value="BOOKING" class="btn btn-secondary text-light">
                                        </form>
                                    
                                    </div>
                                    </div>
                                </div>

                        <div class="col-lg-8 mb-4">
                            <div class="card position-relative table-box-shadow">
                                <div class="card-body">
                                
                                        <div class="card-header py-1">
                                            <h5 class="mt-2 fs-6">Durasi Rental</h5>
                                        </div>
                                        <div class="card-body">
                                        <?php
                                                // Set timezone to Jakarta
                                                date_default_timezone_set("Asia/Jakarta");
                                                
                                                // Get current date and time in Indonesian format
                                                $pickup_time = date("d-m-Y H:i:s");
                                                $return_time = date("d-m-Y H:i:s", strtotime("+1 day"));
                                                ?>
                                                <form action="payment.php" method="get">
                                                    <input type="hidden" name="kode" value="<?php echo $kode; ?>">
                                                    <div class="mb-3">
                                                        <label for="pickup_time" class="form-label">Waktu Pengambilan</label>
                                                        <input type="text" class="form-control" id="pickup_time" name="pickup_time" value="<?php echo $pickup_time; ?>" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="return_time" class="form-label">Waktu Pengembalian</label>
                                                        <input type="text" class="form-control" id="return_time" name="return_time" value="<?php echo $return_time; ?>" readonly>
                                                    </div>
                                                    
                                                </form>
                                               <div class="alert alert-warning mt-3">
                                                            <strong>Perhatian!</strong> Jika sepeda tidak dikembalikan tepat waktu, akan ada denda.
                                                        </div>
                                </div>
                            </div>
                        </div>

                        <!-- hal2 end -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- Bikes End -->

       
    </div>

     <!-- JavaScript Libraries -->
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
