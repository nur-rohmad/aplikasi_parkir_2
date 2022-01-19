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
                        <li class="nav-item " style="border-bottom: 1px solid white;">
                            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index_kendaraan_masuk.php">Kendaraan Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index_kendaraan_keluar.php">Kendaraan Keluar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php">Jenis Kendaraan</a>
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
            <div class="card text-center">
                <div class="card-header bg-primary text-white">
                    <h4>Data Parkir</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        include '../koneksi.php';
                        $jenis = mysqli_query($konek, "SELECT* FROM jenis_kendaraan");
                        foreach ($jenis as $key => $value) :
                        ?>
                            <div class="col">
                                <div class="card text-center  shadow-lg">
                                    <div class="card-header bg-success text-white">
                                        Jumlah <?= $value['jenis_kendaraan'] ?>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        $jenis = $value['id_jns_kendaraan'];
                                        $jumlah_kendaraan = mysqli_query($konek, "SELECT count(plat_no) as 'total' from kendaraan_masuk where jenis_kendaraan=$jenis and status_parkir='1'");
                                        foreach ($jumlah_kendaraan as $key => $value1) {
                                        ?>
                                            <h2 class="text-center"><?= $value1['total'] ?></h2>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="card text-center mt-5">
                <div class="card-header bg-primary text-white">
                    <h4 class="pt-2" style="font-family: 'Times New Roman', Times, serif;">Data Pendapatan Parkir 7 Hari Terakir</h4>
                </div>
                <div class="card-body">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-primary mb-2 container-fluid" style="height: 50px;">
        <p class="text-center text-white pt-3">&copy; 2021 PT. Parkir Aman Sentosa, Inc</p>
    </footer>

    <?php
    include '../koneksi.php';
    $tanggal = mysqli_query($konek, "SELECT SUM(biaya_parkir) as 'pendapatan',waktu_keluar FROM kendaraan_keluar GROUP BY DATE(waktu_keluar) limit 7");
    $label = "";
    $pendapatan = '';
    foreach ($tanggal as $key => $value) {
        # code...
        $date_time = $value['waktu_keluar'];
        $dt = new DateTime($date_time);
        // ambil tanggal
        $tanggal_keluar = $dt->format('d-m-Y');
        $label .= "'$tanggal_keluar'" . ", ";
        // get pendapatan
        $pendapatan_rupiah = $value['pendapatan'];
        $pendapatan .= "'$pendapatan_rupiah'" . ", ";
    }
    // var_dump($pendapatan);
    // die;
    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const data = {
            labels: [<?= $label ?>],
            datasets: [{
                label: 'data Pendapatan',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [<?= $pendapatan ?>],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                        min: 5000,
                        max: 300000
                    }
                }
            }
        };
    </script>
    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

</body>

</html>