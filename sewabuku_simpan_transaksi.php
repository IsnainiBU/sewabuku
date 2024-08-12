<?php include "template_atas.php" ?>
<?php
$peminjam = $_POST['peminjam'];
$email = $_POST['email'];
$notelp = $_POST['notelp'];
$tanggal = date("Y-m-d");
$judul_pilih = '';
$qty = 1;

$dataValid = "YA";
if (strlen(trim($peminjam)) == 0) {
    echo "Nama Harus Diisi...<br/>";
    $dataValid = "TIDAK";
}
if (strlen(trim($notelp)) == 0) {
    echo "No. Telp Harus Diisi...<br/>";
    $dataValid = "TIDAK";
}
if (strlen($_COOKIE['keranjang'])) {
    $judul_pilih = $_COOKIE['keranjang'];
} else {
    echo "Keranjang Peminjaman Kosong<br/>";
    $dataValid = "TIDAK";
}
if ($dataValid == "TIDAK") {
    echo "Masih Ada Kesalahan, Silahkan perbaiki !<br/>";
    echo "<input type='button' value='Kembali'
            onClick='self.history.back()'>";
    exit;
}

include "koneksi_sewabuku.php";

$simpan = true;
$mulai_transaksi = mysqli_begin_transaction($kon);

$sql = "insert into hbuku (tanggal, peminjam, email, notelp)
        values ('$tanggal','$peminjam','$email','$notelp')";
$hasil = mysqli_query($kon, $sql);
if (!$hasil) {
    echo "Data Customer Gagal Simpan<br/>";
    $simpan = false;
}
$idhbuku = mysqli_insert_id($kon);
if ($idhbuku == 0) {
    echo "Data Customer Tidak Ada <br/>";
    $simpan = false;
}
$judul_array = explode(",", $judul_pilih);
$jumlah = count($judul_array);
if ($jumlah <= 1) {
    echo "Tidak Ada Buku Yang Dipilih <br/>";
    $simpan = false;
} else {
    foreach ($judul_array as $idbuku) {
        if ($idbuku == 0) {
            continue;
        }
        $sql = "select * from buku where idbuku = $idbuku";
        $hasil = mysqli_query($kon, $sql);
        if (!$hasil) {
            echo "Buku Tidak Ada<br/>";
            $simpan = false;
            break;
        }
        $sql = "insert into dbuku (idhbuku,idbuku,qty)
            values('$idhbuku','$idbuku','$qty')";
        $hasil = mysqli_query($kon, $sql);
        if (!$hasil) {
            echo "Detail Jual Gagal Simpan <br/>";
            $simpan = false;
            break;
        }
    }
}
if ($simpan) {
    $komit = mysqli_commit($kon);
} else {
    $rollback = mysqli_rollback($kon);
    echo "Peminjaman Gagal <br/>
            <input type='button' value='Kembali'
            onClick='self.history.back()'>";
    exit;
}
header("Location: sewabuku_bukti_pinjam.php?idhbuku=$idhbuku");
setcookie('keranjang', $judul_pilih, time() - 3600);
?>