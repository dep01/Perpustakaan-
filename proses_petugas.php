<?php
// File proses form
include "koneksi.php";

$nama = $_POST["nama"];
$JKelamin = $_POST["jenis_kelamin"];
$alamat = $_POST["alamat"];
$telp = $_POST["no_telp"];
$proses = $_POST["proses"];
$nik = $_POST["nik"];
if ($proses == "insert"){
    $sql = "INSERT INTO mpetugas(NIK, namaPetugas, idJkelamin, alamat, noHP,status) VALUES('$nik', '$nama', '$JKelamin', '$alamat', '$telp',1)";
} else {
    $sql = "UPDATE mpetugas SET namaPetugas = '$nama',noHP = '$telp',alamat ='$alamat',idjkelamin = '$JKelamin' where NIK = '$nik'";
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