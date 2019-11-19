<?php
include 'koneksi.php';

$proses = $_GET['proses'];
if ($proses =="update"){
    $nik = $_GET['nik'];
    $qu =  "SELECT * FROM mpetugas WHERE nik = $nik";
    $data = mysqli_query($conn, $qu);
    $d = mysqli_fetch_array($data);
    if (!$data) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $nama = $d['namaPetugas'];
    $kelamin = $d['idJkelamin'];
    $alamat = $d['alamat'];
    $nohp = $d['noHP'];
} else {
    $nik ="";
    $nama = "";
    $kelamin = "";
    $alamat = "";
    $nohp = "";    
}
?>

<html>
<head>
</head>
<body>
    <table width="700" border="1">
        <tr>
            <td colspan="2" align="center"><h1>Selamat Datang Di Sistem Perpustakaan</h1></td>
        </tr>
        <tr>
            <td width = "200">
                <ul>
                    <li><a href="">Anggota</a></li>
                    <li><a href="buku.php">Buku</a></li>
                    <li><a href="">Pinjam</a></li>
                    <li><a href="petugas.php">Petugas</a></li>
                <ul>
            </td>
            <td width="500">
            <form method="POST" action="proses_petugas.php?">
            <table border="0">
            </td>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><input type="text" name="nik" value="<?php echo $nik ?>"></td>
        </tr>
        <tr>
            <td>Nama Petugas</td>
            <td>:</td>
            <td><input type="text" name="nama" value="<?php echo $nama ?>"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <select name="jenis_kelamin" id="">
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" value="<?php echo $alamat ?>"></td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td>:</td>
            <td><input type="text" name="no_telp" value="<?php echo $nohp ?>"></td>
            <td><input type="hidden" name="proses" value="<?php echo $proses ?>"></td>
            <td><input type="hidden" name="nik" value="<?php echo $nik ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="simpan" value="Simpan"></td>
        </tr>
    </table>
</form>

    <tr>
        <td colspan="2" align="center"><br></script></td>
    </tr>
    
</table>

</body>
</html>