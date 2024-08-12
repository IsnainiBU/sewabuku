<?php include "template_atas.php" ?>
<?php
$judul_pilih = 0;
if (isset($_COOKIE["keranjang"])){
    $judul_pilih = $_COOKIE["keranjang"];
}
if (isset($_GET["idbuku"])){
    $idbuku = $_GET["idbuku"];
    $judul_pilih = $judul_pilih ."," . $idbuku;
    setcookie('keranjang', $judul_pilih, time() + 3600);
}
include "koneksi_sewabuku.php";
$sql = "select * from buku where idbuku not in (".$judul_pilih.")
        order by idbuku desc ";
$hasil = mysqli_query($kon, $sql);
if (!$hasil)
    die("Gagal query.." . mysqli_error($kon));
?>
<h2>DAFTAR BUKU TERSEDIA</h2>
<table border="1">
    <tr>
        <th>Foto</th>
        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th>Operasi</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($hasil)) {
        echo "<tr>";
        echo "<td><a href='fotobuku/{$row['foto']}'/>
                    <img src='thumb_buku/t_{$row['foto']}'width='100'/>
                    </a></td>";
        echo "<td>" . $row['judul'] . "</td>";
        echo "<td>" . $row['pengarang'] . "</td>";
        echo "<td>";
        echo "<a href='" . $_SERVER['PHP_SELF'] . "?idbuku=" .
        $row['idbuku'] . "'>
                    PINJAM</a>";
        echo "</tr>";
    }
    ?>
</table>
<?php include "template_bawah.php" ?>
