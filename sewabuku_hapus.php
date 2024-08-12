<?php include "template_atas.php" ?>
<?php
$idbuku = $_GET["idbuku"];
include "koneksi_sewabuku.php";
$sql = "select*from buku where idbuku = '$idbuku'";
$hasil = mysqli_query($kon, $sql);
if (!$hasil)
    die("Gagal query...");

$data = mysqli_fetch_array($hasil);
$kode = $data['kode'];
$judul = $data['judul'];
$pengarang = $data['pengarang'];
$penerbit = $data['penerbit'];
$stok = $data['stok'];
$foto = $data['foto'];

echo "<fieldset>";
echo "<h2>KONFIRMASI HAPUS BUKU</h2>";
echo "<table border='1' width='100%'> ";
echo "<tr>";
echo "<td colspan='2' align='center'><img src='thumb_buku/t_" . $foto . "'><br/><br/></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Kode Buku</td>";
echo "<td>" . $kode . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Judul Buku</td>";
echo "<td>" . $judul . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Pengarang</td>";
echo "<td>" . $pengarang . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Penerbit</td>";
echo "<td>".$penerbit."</td>";
echo "</tr>";
echo "</table>";
echo "<hr>";
echo "<fieldset>";
echo "<div colspan='2' align='center'>APAKAH DATA INI AKAN DIHAPUS ?<br>";
echo "<a href='sewabuku_hapus.php?idbuku=$idbuku?>&hapus=1'>YA</a>";
echo "&nbsp; &nbsp;";
echo "<a href='sewabuku_tampil.php'>TIDAK</a> </div>";
echo "</fieldset>";
echo "</fieldset>";
if (isset($_GET['hapus'])) {
    $sql = "delete from buku where idbuku = '$idbuku'";
    $hasil = mysqli_query($kon, $sql);
    if (!$hasil) {
        echo "Gagal Hapus Buku : $judul ..<br/>";
        echo "<a href='sewabuku_tampil.php'>Kembali ke Daftar Buku</a>";
    } else {
        $gbr = "fotobuku/$foto";
        if (file_exists($gbr))
            unlink($gbr);
        $gbr = "thumb_buku/t_$foto";
        if (file_exists($gbr))
            unlink($gbr);
        header('location:sewabuku_tampil.php');
    }
}
?>
<?php include "template_bawah.php" ?>
