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

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary mt-3">
            <div class="container">
                <a class="navbar-brand " href="#">
                    E-Parking
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ">
                        <li class="nav-item ">
                            <a class="nav-link " aria-current="page" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index_kendaraan_masuk.php">Kendaraan Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index_kendaraan_keluar.php">Kendaraan Keluar</a>
                        </li>
                        <li class="nav-item" style="border-bottom: 1px solid white;">
                            <a class="nav-link active" href="index.php">Jenis Kendaraan</a>
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
    </header>
    <main>
        <div class="container-fluid mt-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="text-white">Daftar Jenis Kendaran</h3>
                        </div>
                        <div class="col-6">
                            <a href="tambah_jenis.php" class=" btn btn-success float-end"><i class="fas fa-plus me-2"></i>Tambah Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == 'succes') {
                            # code...
                            echo '<div class="alert alert-success alert-dismissible  fade show" role="alert">
                                data berhasil disimpan
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                               </div>';
                        }
                        if ($_GET['pesan'] == 'succes_hapus') {
                            echo '<div class="alert alert-danger alert-dismissible  fade show" role="alert">
                            data berhasil dihapus
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>';
                        }
                    }
                    ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Jenis Kendaraan</th>
                                <th scope="col" class="text-center">Harga / Jam</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../koneksi.php';
                            $no = 1;
                            $data = mysqli_query($konek, "SELECT * FROM jenis_kendaraan");
                            // var_dump($data);
                            // die;
                            foreach ($data as $jns_kendaraan) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td scope="row"><?= $jns_kendaraan["jenis_kendaraan"] ?></td>
                                    <td class="text-center" scope="row">Rp. <?= number_format($jns_kendaraan['harga'], 0, ',', '.'); ?></td>
                                    <td scope="row" class="text-center">
                                        <a class="btn btn-primary" href="edit_jenis.php?id=<?= $jns_kendaraan['id_jns_kendaraan']; ?>">edit</a>
                                        <a class="btn btn-danger ml-2" onclick="return confirm('Ada yakin ingin menghapus jenis kendaraan   : <?= $jns_kendaraan['jenis_kendaraan'] ?>')" href="delete_jenis.php?id=<?= $jns_kendaraan['id_jns_kendaraan']; ?>">Hapus</a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-primary mb-2  container-fluid" style="height: 50px;">
        <p class="text-center text-white pt-3">&copy; 2021 PT. Parkir Aman Sentosa, Inc</p>
    </footer>

</body>

</html>