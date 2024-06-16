<?php
    session_start();

    include "koneksi.php";
    // panggil library
    require_once 'vendor/autoload.php';

    // tampung
    $clientId = '936279215167-dbv7kve02tt22m4ksn7kaa5nqr0jii5i.apps.googleusercontent.com';
    $clientSecret = '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';
    $redirectUri = 'http://localhost/ecobyke2/login.php';

    // inisiasi google client
    $client = new Google_Client();

    // konfigurasi google client
    $client->setClientId($clientId);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);

    $authUrl = $client->createAuthUrl(); // Dapatkan URL otorisasi

    $client->addScope('email');
    $client->addScope('profile');

    if(isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

        // echo "<pre>";
        // print_r($token);
        // echo "</pre>";

        if(!isset($token['error'])){
            $client->setAccessToken($token['access_token']);

            // inisiasi google service oauth2
            $service = new Google_Service_Oauth2($client);
            $profile = $service->userinfo->get();

            // Tambahkan kode untuk menyimpan status login sebagai user di sesi
            // $_SESSION['emailGoogle'] = $profile['email'];
            // $_SESSION['level'] = "user";

            // echo "<pre>";
            // print_r($profile);
            // echo "</pre>";

            // tampung data respon dari akun google
            $g_firstName = $profile['givenName'];
            $g_lastName = $profile['familyName'];
            $g_email = $profile['email'];
            $g_id = $profile['id'];


            // jika id sudah ada di table user, maka lakukan update data saja
            // jika id belum ada, maka lakukan insert data

            $query_check = 'select * from masuk where oauth_id = "'.$g_id.'" ';
            $run_query_check = mysqli_query($koneksi, $query_check);
            $d = mysqli_fetch_object($run_query_check);

            if($d){
                $query_update = 'update masuk set firstName = "'.$g_firstName.'", lastName = "'.$g_lastName.'",
                email = "'.$g_email.'" where oauthId = "'.g_id.'" ';

                $run_query_update = mysqli_query($koneksi, $query_insert);

            }else{
                $query_insert = 'insert into masuk (firstName, lastName, email, oauth_id)
                value ("'.$g_firstName.'", "'.$g_lastName.'", "'.$g_email.'", "'.$g_id.'")';
                $run_query_insert = mysqli_query($koneksi, $query_insert);

                header("Location: index.php");
            }

        }else{
            echo "login gagal";
        }
        
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="img/logo.png" type="" />

    <title>ecobyke - Register</title>

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


    <!-- Custom styles for this template-->
    <link href="css/login.css" rel="stylesheet" />
  </head>

<body class="bg-gradient-primary">


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <img src="img/login.png" alt="" class="col-lg-6 d-none d-lg-block bg-login-image">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    <?php
    				if(isset($_SESSION['error'])) {
    				?>
                <div class="alert alert-warning" role="alert">
                  <?php echo $_SESSION['error']?>
                </div>
                <?php
    				}
    				?>
                <?php
    				if(isset($_SESSION['message'])) {
    				?>
                <div class="alert alert-success" role="alert">
                  <?php echo $_SESSION['message']?>
                </div>
                <?php
    				}
    				?>

                                    <form class="user" action="proseslogin.php" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." required="required">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="password" required="required">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                                        </a>
                                        <hr>
                                        <a href="<?php echo $client->createAuthUrl(); ?>" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/login.js"></script>

</body>

<?php
    session_destroy();
    ?>

</html>