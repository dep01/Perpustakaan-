<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}

$sql = "SELECT * FROM tblpeminjaman WHERE status = 'pinjam'";
$item = mysqli_query($conn, $sql);

$proses = $_GET['proses'];
if ($proses =="update"){
    $nopinjam = $_GET['nomorPeminjaman'];
    $qu = "CALL spTrperpus('get','0','$nopinjam',0,0)";
    $data = mysqli_query($conn, $qu);
    $d = mysqli_fetch_array($data);
    $nik = $d["nik"];
} else {
    $nik = ""; 
}
?>

<html>
<head>
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
            <form method="POST" action="proses_pengembalian.php">
            <table border="0">
            </td>
         <tr>
            <td>Nomor Peminjaman</td>
            <td>:</td>
            <td>
                <select name="nomor_pinjam" id="no_pinjam">
                    <option value="">Pilih No Pinjaman</option>
                    <?php while ($row2 =  mysqli_fetch_array($item)):;?>
                        <option value=<?php echo $row2[0]; ?>><?php echo $row2[0]; ?></option>
                    <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tanggal Peminjaman</td>
            <td>:</td>
            <td><input id="tglPinjam" type="text" name="tgl_pinjam" value="" disabled="true"></td>
        </tr>
        <tr>
            <td>Lama Peminjaman</td>
            <td>:</td>
            <td><input type="text" name="lama_pinjam" id="lama_pinjam" value="" disabled="true"></td>
        </tr>
        <tr>
            <td>Telat</td>
            <td>:</td>
            <td><input type="text" name="telat" id="telat"value="" disabled="true"></td>
        </tr>
        <tr>
            <td>Denda</td>
            <td>:</td>
            <td><input type="text" name="denda" id="denda" value="" disabled="true" ></td>
        </tr>
        <tr>
            <td>Total Denda</td>
            <td>:</td>
            <td><input type="text" name="total_denda" id="total_denda" value="" disabled="true"></td>
        </tr>
        <tr>
            <td><input type="submit" name="simpan" value="Simpan"></td>
        </tr>
        </tr>
    </table>
   
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

<script src="process/jQuery.js"></script>
<script>
    $("#no_pinjam").change(function(){
        var id = $(this).val();
        $.ajax({
            url: 'process/getCode.php?id='+id,
            type: "get",
            dataType: 'json',
            success : function(data){
               
                $('#tglPinjam').val(data.tglPinjam),
                $('#denda').val(data.Pdenda),
                $('#lama_pinjam').val(data.PlamaPinjam),
                $('#telat').val(data.Ptelat),
                $('#total_denda').val(data.PtotalDenda),
                console.log(data)
            }
        })
    });
</script>
</body>
</html>