<?php
include '../koneksi.php';
$id_kendaraan = $_GET['id'];
mysqli_query($konek, "delete from kendaraan_masuk where id_parkir=$id_kendaraan");
header('location:index_kendaraan_masuk.php?pesan=succes_hapus');
