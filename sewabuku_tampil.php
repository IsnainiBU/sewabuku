<?php include "template_atas.php" ?>
<?php
$judul = "";
if (isset($_POST["judul"]))
    $judul = $_POST["judul"];
$pengarang = "";
if (isset($_POST["pengarang"]))
    $pengarang = $_POST["pengarang"];

include "koneksi_sewabuku.php";
$sql = "select * from buku 
        where judul like '%" . $judul . "%'
        and pengarang like '%" . $pengarang . "%'
        order by idbuku desc ";
$hasil = mysqli_query($kon, $sql);
if (!$hasil)
    die("Gagal query.." . mysqli_error($kon));
?>
<table border="1">
    <tr>
        <th>Foto</th>
        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th> </th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($hasil)) {
        echo "<tr>";
        echo "<td><a href='fotobuku/{$row['foto']}'/>
                    <img src='thumb_buku/t_{$row['foto']}' width='100'/>
                    </a></td>";
        echo "<td>" . $row['judul'] . "</td>";
        echo "<td>" . $row['pengarang'] . "</td>";
        echo "<td>";
        echo "<a href='sewabuku_lihat.php?idbuku=" . $row['idbuku'] . "'>
                    Lihat Buku</a>";
        echo "<a href='sewabuku_edit.php?idbuku=" . $row['idbuku'] . "'>
                    Edit Buku</a>";
        echo "<a href='sewabuku_hapus.php?idbuku=" . $row['idbuku'] . "'>
                    Hapus Buku</a>";
        echo "</tr>";
    }
    ?>
</table>
<?php include "template_bawah.php" ?>
