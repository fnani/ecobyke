<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>rental ecobyke</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="shortcut icon" href="img/logo.png" type="" />

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
        <div class="container-xxl position-relative p-0">
            <?php include "header.php" ?>

            <div class="container-xxl py-5 bg-primary hero-header">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-12 text-center">
                            <h1 class="text-white animated slideInDown">Rental</h1>
                            <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">Rental</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


 <!-- Projects Start -->
 <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>Rent Now<span></span></p>
                    <h1 class="text-center mb-5">Bikes Available For Rent</h1>
                </div>
                <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="col-12 text-center">
                        <ul class="list-inline mb-5" id="portfolio-flters">
                            <li class="mx-2 active" data-filter="*">Semua</li>
                            <li class="mx-2" data-filter=".first">Tersedia</li>
                            <li class="mx-2" data-filter=".second">Sedang Disewa</li>
                        </ul>
                    </div>
                </div>
                
                <div class="row g-4 portfolio-container">
                <?php
                 include "koneksi.php";
                 $query = mysqli_query($koneksi, "SELECT * FROM tb_sepeda");
                 while ($row = mysqli_fetch_assoc($query)) {
                 $merek = $row['merek'];
                 $tipe = $row['tipe'];
                 $gambar = $row['gambar'];
                 $kode = $row['kode'];
                 $status = $row['status']; // tambahkan kolom status

                // cek status sepeda
                if ($status == "tersedia") {
                    $kelas_portfolio = "first"; // Tampilkan sepeda di bagian 'Tersedia'
                } else {
                    $kelas_portfolio = "second"; // Tampilkan sepeda di bagian 'Sedang Disewa'
                }

                // Ambil data pengguna yang sedang menyewa sepeda
                $query_penyewa = mysqli_query($koneksi, "SELECT * FROM tb_pemesanan WHERE kode = '$kode' AND status = 'Disewa'");
                $query_booking = mysqli_query($koneksi, "SELECT * FROM tb_pemesanan WHERE kode = '$kode' AND status = 'Pending'");
                if(mysqli_num_rows($query_penyewa) > 0) {
                    $data_penyewa = mysqli_fetch_assoc($query_penyewa);
                    $penyewa = $data_penyewa['username'];
                } elseif(mysqli_num_rows($query_booking) > 0) {
                    $data_booking = mysqli_fetch_assoc($query_booking);
                    $booking = $data_booking['username'];
                }


                ?>
                    <div class="col-lg-4 col-md-6 portfolio-item <?php echo $kelas_portfolio; ?> wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <?php
                                echo '<img src="sepeda/'.$gambar.'" class="img-fluid w-100" alt="">';
                                ?>
                                <div class="portfolio-overlay">
                                    <?php if($status == 'tersedia'): ?>
                                        <a class="btn btn-square btn-outline-light mx-1" href="sepeda/<?php echo $gambar; ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-square btn-outline-light mx-1" href="pesan.php?kode=<?php echo $row['kode'];?>"><i class="fa fa-link"></i></a>
                                        <?php elseif($status == 'Disewa'): ?>
                                        <p class="text-light fw-bold mx-1">Sedang Disewa oleh <?php echo $penyewa; ?></p>
                                    <?php elseif($status == 'Pending'): ?>
                                        <p class="text-light fw-bold mx-1">Sedang dibooking oleh <?php echo $booking; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2"><?php echo $merek ;?></p>
                                <h5 class="lh-base mb-0"><?php echo $tipe ;?></a>
                                <p><?php $kode;?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Projects End -->



        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <p class="section-title text-secondary justify-content-center"><span></span>Testimonial<span></span></p>
                <h1 class="text-center mb-5">What Say Our Clients!</h1>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

        <?php include "footer.php" ?>
</body>

</html>