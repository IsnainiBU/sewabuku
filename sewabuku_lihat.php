<?php include "template_atas.php" ?>
<?php
$idbuku = $_GET["idbuku"];
include "koneksi_sewabuku.php";
$sql = "select * from buku where idbuku like '%" . $idbuku . "%'
        order by idbuku desc ";
$hasil = mysqli_query($kon, $sql);
if (!$hasil)
    die("Gagal query.." . mysqli_error($kon));
?>
<h2>INFORMASI BUKU</h2>
<table border="1">
    <?php
    $no=0;
    while ($row = mysqli_fetch_assoc($hasil)) {
    echo "<tr>";
    echo "<th colspan='2'>";
    echo "<a href='fotobuku/{$row['foto']}'/>
            <img src='thumb_buku/t_{$row['foto']}' width='100'/></a>";
    echo "</th>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>Kode Buku</td>";
        echo "<td>" . $row['kode'] . "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>Judul Buku</td>";
        echo "<td>" . $row['judul'] . "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>Pengarang</td>";
        echo "<td>" . $row['pengarang'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Penerbit</td>";
        echo "<td>" . $row['penerbit'] . "</td>";
    echo "</tr>";
        }
    ?>
</table>
<?php include "template_bawah.php" ?>
