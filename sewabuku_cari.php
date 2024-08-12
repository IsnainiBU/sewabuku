<?php include "template_atas.php" ?>
<form action="sewabuku_tampil.php" method="post">
    <h2>CARI BUKU</h2>
    <hr size="3" color="darkgrey">
    <table>
        <tr>
            <td>Judul</td>
            <td><input type="text" name="judul"></td>
        </tr>
        <tr>
            <td>Pengarang</td>
            <td><input type="text" name="pengarang"></td>
        </tr>
    </table>
    <hr>
    <input type="submit" value="CARI">
</form>
<?php include "template_bawah.php" ?>
