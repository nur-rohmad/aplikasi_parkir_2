<?php
include '../koneksi.php';
$id_jenis = $_GET['id'];
mysqli_query($konek, "DELETE from jenis_kendaraan where id_jns_kendaraan='$id_jenis'");
header('location:index.php?pesan=succes_hapus');
