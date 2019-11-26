<?php
// File proses form
include "koneksi.php";
$proses = $_GET["proses"];
if ($proses=="delete"){
    $nik = $_GET["nik"];
} else {
    $nama = $_POST["nama"];
    $JKelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];
    $telp = $_POST["no_telp"];
    $nik = $_POST["nik"];
}
$pesan = "";

if ($proses == "insert"){
    $sql = "INSERT INTO mpetugas(NIK, namaPetugas, idJkelamin, alamat, noHP,status) VALUES('$nik', '$nama', '$JKelamin', '$alamat', '$telp',1)";
    $pesan = "Data berhasil di tambahkan :)";
} elseif ($proses=="update") {
    $sql = "UPDATE mpetugas SET namaPetugas = '$nama',noHP = '$telp',alamat ='$alamat',idjkelamin = '$JKelamin' where NIK = '$nik'";
    $pesan = "Data berhasil di-Update :)";
} else {
    $sql ="update mpetugas set status = 9 where NIK = '$nik'";
    $pesan = "Data berhasil di hapus :)";
}

// Buat query insert datanya


// Jalankan query
// isset digunakan untuk jika salah satu inputan tidak ter-input data tidak masuk ke database
$hasil = mysqli_query($conn, $sql);
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