<?php


include '../koneksi.php';
if (isset($_POST['submit'])) {
    $id_parkir = $_POST['id_parkir'];

    $data = mysqli_query($konek, "SELECT * FROM kendaraan_masuk WHERE id_parkir='$id_parkir'");
    foreach ($data as $key => $value) {
        $plat_no = $value['plat_no'];
        $waktu_masuk = $value['waktu_masuk'];
        $jenis_kendaraan = $value['jenis_kendaraan'];
    }
    date_default_timezone_set('Asia/Jakarta');
    // waktu awal kendaran masuk
    $waktu_masuk_parkir = strtotime($waktu_masuk);
    // waktu keluar
    $jam_keluar = date("Y-m-d H:i:s");
    $waktu_keluar = strtotime($jam_keluar);
    // lama parkir
    $lama_parkir = $waktu_keluar - $waktu_masuk_parkir;
    // lama parkir dibulatkan per jam
    $lama_jam_parkir = floor($lama_parkir / (60 * 60));
    // get biaya per jam
    $biaya_perJam = mysqli_query($konek, "SELECT harga from jenis_kendaraan WHERE id_jns_kendaraan='$jenis_kendaraan'");
    foreach ($biaya_perJam as $key => $value) {
        $harga = $value['harga'];
    }
    // jika tidak ada 1 jam maka dihitung 1 jam
    if ($lama_jam_parkir <= 0) {
        # code...
        $biaya = $harga;
    }
    // jika 1 jam lebih  
    else {
        # code...
        $biaya = $harga * $lama_jam_parkir;
    }

    // insert data kendaraan keluar
    $insert_kendaraan_keluar = mysqli_query($konek, "INSERT INTO kendaraan_keluar values('','$id_parkir','$jam_keluar','$lama_jam_parkir','$biaya')");

    if ($insert_kendaraan_keluar) {
        # code...
        mysqli_query($konek, "UPDATE kendaraan_masuk SET status_parkir = '0' where id_parkir='$id_parkir'");
        header('location:index_kendaraan_keluar.php?pesan=succes');
    }
}
