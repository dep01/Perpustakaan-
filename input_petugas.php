<?php
include 'koneksi.php';
$sql = "SELECT * FROM mjkelamin";
$item = mysqli_query($conn, $sql);
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
    <table width="1200" border="2" align="center"> 
        <tr>
            <td colspan="2" align="center"><h1>Sistem Informasi Perpustakaan</h1></td>
        </tr>
        <tr>
            <td width = "200" align="center">
                <ul>
                    <a href="anggota.php">Anggota</a> ||
                    <a href="buku.php">Buku</a> ||
                    <a href="petugas.php">Petugas</a> ||
                    <a href="pinjam.php">Peminjaman Buku</a> ||
                    <a href="pengembalian.php">Pengembalian Buku</a>
                <ul>
            </td>
        </tr>
        <tr>
            <td width="500" align="center">
            <form method="POST" action="proses_petugas.php?proses=<?php echo $proses ?>">
            <table border="0">
            </td>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><input type="text" name="nik" value="<?php echo $nik ?>" maxlength="12"></td>
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
                <?php while ($row1 =  mysqli_fetch_array($item)):;?>
                <option value=<?php echo $row1[0]; ?>><?php echo $row1[1]; ?></option>
                <?php endwhile; ?>
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
        </tr>
        <tr>
            <td><input type="submit" name="simpan" value="Simpan"></td>
        </tr>
        </tr>
    </table>
</form>

    <tr>
        <td colspan="2" align="center"><br></script></td>
    </tr>
    
</table>

</body>
</html>