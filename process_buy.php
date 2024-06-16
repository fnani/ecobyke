<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_sepeda = $_POST['kode'];
    $user_id = $_POST['user_id'];
    $waktu_pengambilan = $_POST['pickup_time'];
    $waktu_pengembalian = $_POST['return_time'];

    $query = "INSERT INTO tb_pemesanan (user_id, kode_sepeda, waktu_pengambilan, waktu_pengembalian, status)
              VALUES ('$user_id', '$kode_sepeda', '$waktu_pengambilan', '$waktu_pengembalian', 'Paid')";

    

    if (mysqli_query($koneksi, $query)) {
        echo "Pembayaran berhasil! Pesanan Anda telah diterima.";
        // Redirect to a confirmation page or display confirmation message
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>
