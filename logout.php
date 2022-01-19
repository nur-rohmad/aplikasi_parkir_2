<?php

//sesion start
session_start();

//menghapus semua sesion
session_destroy();

//kembai ke halaman login
header("location:index.php?pesan=logout");
