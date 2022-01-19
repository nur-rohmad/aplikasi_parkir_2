<?php
$konek = mysqli_connect("localhost", "root", "", "e-parkir");

if (mysqli_connect_errno()) {
    echo "tidak terkoneksi ke databse";
}
