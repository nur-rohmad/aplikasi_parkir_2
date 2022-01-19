<?php
include '../koneksi.php';
if (isset($_POST['submit'])) {
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $id_jenis = $_POST['id_jenis'];

    mysqli_query($konek, "UPDATE jenis_kendaraan set jenis_kendaraan='$jenis', harga='$harga' where id_jns_kendaraan='$id_jenis'");
    header('location:index.php?pesan=succes');
}
