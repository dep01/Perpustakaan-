<?php
// File proses form
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
$penerbit = $_POST["penerbit"];
$id = $_POST["id"];
$proses = $_POST["proses"];
if ($proses == "insert"){
    $sql = "call spTrperpus('pinjam','$NIK','0',$idbuku,$idanggota)";
} else {
    $sql = "UPDATE mpenerbit SET namaPenerbit = '$penerbit' WHERE idPenerbit = '$id'";
}
//call spTrperpus('kembali','NIK','$Nomor pinjam',0,0)
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