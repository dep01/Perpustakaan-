<?php
// File proses form
include "koneksi.php";

$penerbit = $_POST["penerbit"];
$id = $_POST["id"];
$proses = $_POST["proses"];
if ($proses == "insert"){
    $sql = "INSERT INTO mpenerbit(namaPenerbit,status) VALUES('$penerbit',1)";
} else {
    $sql = "UPDATE mpenerbit SET namaPenerbit = '$penerbit' WHERE idPenerbit = '$id'";
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