<?php
// File proses form
include "koneksi.php";

$jenis = $_POST["jenis_buku"];
$id = $_POST["id"];
$proses = $_POST["proses"];
if ($proses == "insert"){
    $sql = "INSERT INTO mjenisbuku(jenisBuku,status) VALUES('$jenis',1)";
} else {
    $sql = "UPDATE mjenisbuku SET jenisBuku = '$jenis' WHERE idJenisBuku = '$id'";
}

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