<?php
// File proses form
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
$nomorpinjam = $_POST["nomor_pinjam"];
//$sql = "CALL spTrperpus('pinjam','$nama','0',$buku,$petugas)"; coba dicek bedanya dimana

$sql = "CALL spTrperpus('get','0','$nomorpinjam',0,0)";

// call spTrperpus('kembali','NIK','$Nomor pinjam',0,0)
// Buat query insert datanya
// Jalankan query
// isset digunakan untuk jika salah satu inputan tidak ter-input data tidak masuk ke database
$hasil = mysqli_query($conn, $sql);
if ($hasil){
    echo "
        <script>
        alert('Data berhasil di tambahkan!');
        document.location.href = 'index.php';
        </script>
        ";
        
    } else {
        echo "
        <script>
        alert('Data gagal di tambahkan!');
        document.location.href = 'index.php';
        </script>
        ";
    
    }
?>