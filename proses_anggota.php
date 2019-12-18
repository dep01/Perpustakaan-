<?php
// File proses form
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}

$proses = $_GET["proses"];
if (!$proses) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
if ($proses=="delete"){
    $id = $_GET["id"];
} else {
    $nama = $_POST["nama"];
    $JKelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];
    $telp = $_POST["noHP"];
    $proses = $_POST["proses"];
    $id = $_POST["id"];
}
$pesan = "";
if ($proses == "insert"){
    $sql = "INSERT INTO manggota(namaAnggota, idJkelamin, alamat, noHP,status) VALUES('$nama', '$JKelamin', '$alamat', '$telp',1)";
    $pesan = "Data berhasil ditambahkan!";
} elseif ($proses =="delete"){
    $sql = "update manggota set status = 9 where idanggota = '$id'";
    $pesan = "Data berhasil dihapus :)";
} else {
    $sql = "UPDATE manggota SET namaAnggota = '$nama',noHP = '$telp',alamat ='$alamat',idjkelamin = '$JKelamin' where idanggota = '$id'";
    $pesan ="Data berhasil di-Update :)";
}

// Buat query insert datanya


// Jalankan query
// isset digunakan untuk jika salah satu inputan tidak ter-input data tidak masuk ke database
$hasil = mysqli_query($conn, $sql);
if (!$hasil) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
if ($hasil){
    echo "
        <script>
        alert('$pesan');
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