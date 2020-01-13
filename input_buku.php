<?php  
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
$sql = "SELECT * FROM mjenisbuku WHERE status = 1";
$item = mysqli_query($conn, $sql);

$sql1 = "SELECT * FROM mpenerbit WHERE status = 1";
$item1 = mysqli_query($conn, $sql1);

$sql2 = "SELECT * FROM mrakbuku WHERE status = 1";
$item2 = mysqli_query($conn, $sql2);

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
    <title>PERPUSTAKAAN</title>
    <link rel="stylesheet" type="text/css" href="assets/css/app.css">
</head>
<body>

        <div class="card">
            <div class="card-body">

    <style type="text/css">
        .pagination li{
            float: left;
            list-style-type: none;
            margin: 5px;
        }
    </style>

    <h1>Sistem Informasi Perpustakaan</h1>

    <div class="form-grup"></div>
    </form>

        <a href="anggota.php" class="btn btn-primary ml-1" style="text-decoration: none;">Anggota</a>
        <a href="buku.php" class="btn btn-primary ml-1" style="text-decoration: none;">Buku</a>
        <a href="petugas.php" class="btn btn-primary ml-1" style="text-decoration: none;">Petugas</a>
        <a href="pinjam.php" class="btn btn-primary ml-1" style="text-decoration: none;">Peminjaman Buku</a>
        <a href="pengembalian.php" class="btn btn-primary ml-1" style="text-decoration: none;">Pengembalian Buku</a>
        
        <br>
        <br>

        <tr>
            <td width="500" align="center">
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
            <td>Lokasi Buku</td>
            <td>:</td>
            <td>
                <select name="lokasi_buku" id="">
                <?php while ($row2 =  mysqli_fetch_array($item2)):;?>
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
            <td>Jumlah Buku</td>
            <td>:</td>
            <td><input type="text" name="jumlah_buku" value=""></td>
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
        </tr>
    </table>
    <br>
</form>

    <tr>
        <td colspan="2" align="right">
            <button>
                <a href="daftar.php" style="text-decoration:none;">Daftar</a>
            </button>
            <button>
                <a href="logout.php" style="text-decoration:none;">Logout</a>
            </button>
        </td>
    </tr>  
</table>
</body>
</html>