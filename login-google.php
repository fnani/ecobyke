<?php
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

                echo "login berhasil";
            }

        }else{
            echo "login gagal";
        }
        
    }

?>
