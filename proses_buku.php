<?php
// File proses form
include "koneksi.php";

$penerbit = $_POST["penerbit"];
$jenis = $_POST["jenis_buku"];
$judul = $_POST["judul_buku"];
$jangka = $_POST["jangka_waktu"];
$denda = $_POST["denda"];
$tanggal = $_POST["tgl_terbit"];
$id = $_POST["id"];
$proses = $_POST["proses"];
if ($proses == "insert"){
    $sql = "INSERT INTO mbuku(idPenerbit, idJenisBuku, judulBuku, jangkaWaktu, dendaPerhari, tglTerbit) VALUES('$penerbit', '$jenis', '$judul', '$jangka', '$denda', '$tanggal')";
} else {
    $sql = "UPDATE mbuku SET idPenerbit = '$penerbit',idJenisBuku = '$jenis',judulBuku = '$judul',jangkaWaktu = '$jangka',dendaPerhari = '$denda',tglTerbit = '$tanggal' where idBuku = '$id'";
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