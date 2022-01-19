<?php
include '../koneksi.php';
$id_parkir = $_GET['id'];
mysqli_query($konek, "delete from kendaraan_masuk where id_parkir=$id_parkir");
mysqli_query($konek, "delete from kendaraan_keluar where id_parkir=$id_parkir");
header('location:index_kendaraan_keluar.php?pesan=succes_hapus');
