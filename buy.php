<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['email'])) {
   echo "<script>
           alert('Login sebelum melanjutkan');
           window.location.href = 'login.php';
         </script>";
   exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $id_user = $_POST['id_user'];
    $sepeda = $_POST['sepeda'];
    $kode = $_POST['kode'];
    $status = "Pending";

    // Insert data into table tb_pemesanan using prepared statements
    $query = mysqli_query($koneksi, "INSERT INTO tb_pemesanan (username, id_user, sepeda, kode, status) 
    VALUES ('$username', '$id_user', '$sepeda', '$kode', '$status')");
   
    // Check if INSERT query was successful
    if($query){
        // Update status of the bike to 'Pending'
        $query2 = "UPDATE tb_sepeda SET status='Pending' WHERE kode='$kode'";
        if(mysqli_query($koneksi, $query2)){
            header("location: sabar.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($koneksi);
        }
     } else {
        echo "Error: " . mysqli_error($koneksi);
     }
}
?>
