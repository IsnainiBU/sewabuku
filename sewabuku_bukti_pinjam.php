<?php include "template_atas.php" ?>
<style type="text/css">
    @media print {
        #tombol {
            display: none;
        }
    }
</style>
<div id="tombol">
    <input type="button" value="Pinjam Lagi" onclick="window.location.assign('sewabuku_tersedia.php')">
    <input type="button" value="Print" onclick="window.print()">
</div>
<?php
$idhbuku = $_GET["idhbuku"];
include "koneksi_sewabuku.php";
$sqlhbuku = "SELECT * FROM hbuku WHERE idhbuku = '$idhbuku'";
$hasilhbuku = mysqli_query($kon, $sqlhbuku);
$rowhbuku = mysqli_fetch_assoc($hasilhbuku);

echo "<pre>";
echo "<h2> BUKTI PEMINJAMAN </h2>";
echo "NO. NOTA  : " . date("Ymd") . $rowhbuku['idhbuku'] . "<br/>";
echo "TANGGAL   : " . $rowhbuku['tanggal'] . "<br/>";
echo "NAMA      : " . $rowhbuku['peminjam'] . "<br/>";
$sqldbuku = "SELECT buku.judul, buku.pengarang, dbuku.qty
                from dbuku inner join buku
                on dbuku.idbuku = buku.idbuku
                where dbuku.idhbuku = $idhbuku";
$hasildbuku = mysqli_query($kon, $sqldbuku);
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>";
echo "<th> Judul Buku </th>";
echo "<th> Pengarang </th>";
echo "</tr>";
$totalbuku = 0;
while ($rowdbuku = mysqli_fetch_assoc($hasildbuku)) {
    echo "<tr>";
    echo "<td >" . $rowdbuku['judul'] . "</td>";
    echo "<td > " . $rowdbuku['pengarang'] . "</td>";
    echo "</tr>";
    $totalbuku = $totalbuku + $rowdbuku['qty'];
}
echo "<tr>";
echo "<td align='right'>";
echo "  <strong>Total Buku</strong></td>";
echo "<td align='right'><strong>$totalbuku</strong></td>";
echo "</tr>";
echo "</table>";
echo "</pre>";
?>
<?php include "template_bawah.php" ?>
