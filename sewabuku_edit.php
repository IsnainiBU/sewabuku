<?php include "template_atas.php" ?>
<?php
$idbuku = $_GET["idbuku"];
include "koneksi_sewabuku.php";
$sql = "select*from buku where idbuku = '$idbuku'";
$hasil = mysqli_query($kon, $sql);
if (!$hasil)
    die("Gagal query...");

$data = mysqli_fetch_array($hasil);
$kode       = $data['kode'];
$judul      = $data['judul'];
$pengarang  = $data['pengarang'];
$penerbit   = $data['penerbit'];
$stok       = $data['stok'];
$foto       = $data['foto'];

?>
<h2>INPUT BUKU</h2>
<hr>
<form action="sewabuku_simpan.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idbuku" value="<?php echo $idbarang; ?>">
    <table>
        <tr>
            <td>Kode</td>
            <td><input type="text" name="kode" size="4" maxlength="4" value="<?php echo $kode;?>"></td>
        </tr>
        <tr>
            <td>Judul Buku</td>
            <td><input type="text" name="judul" value="<?php echo $judul;?>"></td>
        </tr>
        <tr>
            <td>Pengarang</td>
            <td><input type="text" name="pengarang"value="<?php echo $pengarang;?>"></td>
        </tr>
        <tr>
            <td>Penerbit</td>
            <td><input type="text" name="penerbit"value="<?php echo $penerbit;?>"></td>
        </tr>
        <tr>
            <td>Jumlah Stok</td>
            <td><input type="text" name="stok" value="<?php echo $stok;?>"></td>
        </tr>
        <tr>
            <td>Foto Sampul</td>
            <td>
                <input type="file" name="foto"><br>
                <input type="hidden" name="foto_lama" value="<?php echo $foto; ?>">
                <img src="<?php echo "thumb/t_" . $foto; ?>" width="100px">
            </td>
        </tr>
    </table>
    <hr>
    <input type="submit" value="Simpan" name="proses">
    <input type="reset" value="Reset" name="reset">
</form>
<?php include "template_bawah.php" ?>
