<?php

//sesion start
session_start();

//koneksi ke database
include 'koneksi.php';

//tangkap inputan dari login
$user_name = $_POST['user_name'];
$password = $_POST['pass'];

$data = mysqli_query($konek, "SELECT * FROM user_table WHERE user_name = '$user_name' AND password= '$password'");

//menghitung data yang ditemukan 
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    # code...
    $_SESSION['user_name'] = $user_name;
    $_SESSION['status'] = "login";

    header("location:admin/dashboard.php");
} else {
    # code...
    header("location:index.php?pesan=gagal");
}
