<?php


include '../koneksi.php';
if (isset($_POST['submit'])) {
    $plat_no = $_POST['plat_no'];
    $jenis_kendaraan = $_POST['jenis_kendaraan'];

    mysqli_query($konek, "INSERT into kendaraan_masuk values( '', '$plat_no',now(),'$jenis_kendaraan','1')");
    header("location:index_kendaraan_masuk.php?pesan=succes");
}
