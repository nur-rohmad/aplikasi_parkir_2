<?php

include '../koneksi.php';
if (isset($_POST['submit'])) {
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    mysqli_query($konek, "INSERT into jenis_kendaraan values( '', '$jenis','$harga')");


    header('location:index.php?pesan=succes');
}
