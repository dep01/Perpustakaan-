<?php
// File proses form
include "koneksi.php";

$nama = $_POST["nama"];
$JKelamin = $_POST["jenis_kelamin"];
$alamat = $_POST["alamat"];
$telp = $_POST["noHP"];
$proses = $_POST["proses"];
$id = $_POST["id"];
if ($proses == "insert"){
    $sql = "INSERT INTO manggota(namaAnggota, idJkelamin, alamat, noHP) VALUES('$nama', '$JKelamin', '$alamat', '$telp')";
} else {
    $sql = "UPDATE manggota SET namaAnggota = '$nama',noHP = '$telp',alamat ='$alamat',idjkelamin = '$JKelamin' where idanggota = '$id'";
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