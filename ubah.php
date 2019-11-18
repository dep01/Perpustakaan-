<?php
include 'koneksi.php';
$id = $_GET['id'];
$qu =  "SELECT * FROM manggota WHERE idAnggota = $id";
$data = mysqli_query($conn, $qu);
$d = mysqli_fetch_array($data);
$nama = $d['namaAnggota'];
$hp = $d['noHP'];
$alamat = $d['alamat'];
$jk = $d['idJkelamin']
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
                    <li><a href="">Buku</a></li>
                    <li><a href="">Pinjam</a></li>
                <ul>
            </td>
            <td width="500">
            <form action="" method="POST">
                <input type="hidden" name="id" value="">
                        
            <table border="0">
            </td>
        <tr>
            <td>Nama Anggota</td>
            <td>:</td>
            <td><input type="text" name="nama" value="<?php echo $nama?>"></td>
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
            <td><input type="text" name="alamat" value="<?php echo $alamat?>"></td>
        </tr>
        <tr>
            <td>No. HP</td>
            <td>:</td>
            <td><input type="text" name="noHP" id="noHP" value="<?php echo $hp?>"></td>
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