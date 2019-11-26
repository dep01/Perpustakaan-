<?php
include 'koneksi.php';
$sql = "select * from mjenisbuku where status = 1";
$item = mysqli_query($conn, $sql);
$sql1 = "select * from mpenerbit where status = 1";
$item1 = mysqli_query($conn, $sql1);
$proses = $_GET['proses'];
if ($proses =="update"){
    $id = $_GET['id'];
    $qu =  "SELECT * FROM mbuku WHERE idBuku = $id";
    $data = mysqli_query($conn, $qu);
    $d = mysqli_fetch_array($data);
    $penerbit = $d['idPenerbit'];
    $jenis = $d['idJenisBuku'];
    $judul = $d['judulBuku'];
    $jangka = $d['jangkaWaktu'];
    $denda = $d['dendaPerhari'];
    $tgl = $d['tglTerbit'];
} else {
    $id ="";
    $penerbit = "";
    $jenis = "";
    $judul = "";
    $jangka = "";
    $denda = "";
    $tgl = "";     
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
            <form method="POST" action="proses_buku.php?proses=<?php echo $proses ?>">
            <table border="0">
            </td>
        <tr>
            <td>Penerbit</td>
            <td>:</td>
            <td>
                <select name="penerbit" id="">
                <?php while ($row1 =  mysqli_fetch_array($item1)):;?>
                <option value=<?php echo $row1[0]; ?>><?php echo $row1[1]; ?></option>
                <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Jenis Buku</td>
            <td>:</td>
            <td>
                <select name="jenis_buku" id="">
                <?php while ($row2 =  mysqli_fetch_array($item)):;?>
                <option value=<?php echo $row2[0]; ?>><?php echo $row2[1]; ?></option>
                <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Judul Buku</td>
            <td>:</td>
            <td><input type="text" name="judul_buku" value="<?php echo $judul ?>"></td>
        </tr>
        <tr>
            <td>Jangka Waktu</td>
            <td>:</td>
            <td><input type="text" name="jangka_waktu" value="<?php echo $jangka ?>"></td>
        </tr>
        <tr>
            <td>Denda Perhari</td>
            <td>:</td>
            <td><input type="text" name="denda" value="<?php echo $denda ?>"></td>
        </tr>
        <tr>
            <td>Tanggal Terbit</td>
            <td>:</td>
            <td><input type="date" name="tgl_terbit" value="<?php echo $tanggal ?>"></td>
            <td><input type="hidden" name="id" value="<?php echo $id ?>"></td>
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