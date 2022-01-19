<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Apilkasi Parkir</title>
    <!-- css bostrab -->
    <link rel="stylesheet" href="../assets/css/boostrab/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- fontn anwoseme -->
    <link rel="stylesheet" href="../assets/fontawesome-free/css/all.min.css">
    <!-- js -->
    <script src="../assets/js/boostrab/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    // // sesiaon start
    // session_start();

    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:../index.php?pesan=belum_login");
    }
    ?>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mt-3">
        <div class="container">
            <a class="navbar-brand " href="#">
                E-Paeking
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item ">
                        <a class="nav-link " aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item" style="border-bottom: 1px solid white;">
                        <a class="nav-link active" href="#">Kendaraan Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kendaraan Keluar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Jenis Kendaraan</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <span class="text-end text-white"><?php
                                                            echo $_SESSION['user_name'];
                                                            ?> <a href="../logout.php" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i></a></span>

                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <main>
        <div class="container-fluid mt-4">
            <div class="card col-6 mx-auto">
                <div class="card-header bg-primary">
                    <div class="row">
                        <div class="col-9">
                            <h3 class="text-white">Tambah Kendaraan Masuk</h3>
                        </div>
                        <div class="col-3">
                            <a href="index_kendaraan_masuk.php" class=" btn btn-success float-end"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="proses_tambah_kendaran_masuk.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Plat Nomor</label>
                            <input type="text" class="form-control" name="plat_no">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Jenis Kendaraan</label>
                            <select name="jenis_kendaraan" class="form-control">
                                <?php
                                include '../koneksi.php';
                                $data = mysqli_query($konek, "SELECT * FROM jenis_kendaraan");
                                foreach ($data as $jenis) :
                                ?>
                                    <option value="<?= $jenis['id_jns_kendaraan'] ?>"><?= $jenis['jenis_kendaraan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>



    <footer class="bg-primary  container-fluid fixed-bottom " style="height: 50px;">
        <p class="text-center text-white pt-3">&copy; 2021 PT. Parkir Aman Sentosa, Inc</p>
    </footer>




</body>

</html>