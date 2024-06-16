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
                                    <h3 class="card-title">Berhasil Booking</h3>
                                    <p>Silahkan mengambil sepeda dilokasi sebelum satu jam dari sekarang.</p>
                                </div>
                            </div>
                        </div>
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
