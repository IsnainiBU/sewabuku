<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "sewabuku";

$kon = mysqli_connect($host, $user, $pass);
if (!$kon)
    die("Gagal Koneksi....");

$hasil = mysqli_select_db($kon, $dbName);
if (!$hasil) {
    $hasil = mysqli_query($kon, "CREATE DATABASE IF NOT EXISTS $dbName");
    if (!$hasil)
        die("Gagal Buat Database");
    else
        $hasil = mysqli_select_db($kon, $dbName);
    if (!$hasil)
        die("Gagal Konek Database");
}
$sqlTabelBuku = "CREATE TABLE IF NOT EXISTS buku(
    idbuku int (11) auto_increment not null primary key,
    kode varchar (10) not null,
    judul varchar (40) not null, 
    pengarang varchar (40) not null, 
    penerbit varchar (40) not null, 
    stok int (11) not null default 0,
    foto varchar (40) not null default '',
    KEY(idbuku) )";
mysqli_query($kon, $sqlTabelBuku) or die("Gagal Buat Tabel Buku");

$sqlTabelHbuku = "CREATE table if not exists hbuku (
                idhbuku int auto_increment not null primary key,
                tanggal date not null,
                peminjam varchar(40) not null,
                email varchar(50) not null default '', 
                notelp varchar(20) not null default '')";

mysqli_query($kon, $sqlTabelHbuku) or die("Gagal Buat Tabel Header buku");

$sqlTabelDbuku = "CREATE table if not exists dbuku (
                iddbuku int auto_increment not null primary key,
                idhbuku int not null,
                idbuku int not null,
                qty int not null )";

mysqli_query($kon, $sqlTabelDbuku) or die("Gagal Buat Tabel Detail buku");

$sqlTabelUser ="CREATE TABLE IF NOT EXISTS pengguna (
    idpengguna int auto_increment not null primary key,
    user varchar(25) not null,
    pass varchar(50) not null,
    nama_lengkap varchar(50) not null
    )";

mysqli_query($kon, $sqlTabelUser) or die("Gagal Buat Tabel Pengguna");

$sql ="SELECT * FROM pengguna";
$hasil = mysqli_query($kon, $sql);
$jumlah = mysqli_num_rows($hasil);
if($jumlah == 0 ){
    $sql = "INSERT INTO pengguna (user, pass, nama_lengkap)
    values ('admin', md5('admin'),'administrator')";
    mysqli_query($kon, $sql);
}
?>