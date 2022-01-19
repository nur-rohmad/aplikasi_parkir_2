<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Apilkasi Parkir</title>
    <!-- css bostrab -->
    <link rel="stylesheet" href="assets/css/boostrab/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- fontn anwoseme -->
    <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css">
    <style>
        .bg {
            background-image: url('assets/img/bg.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <!-- <div class="bg"></div> -->
    <div class="jumbotron vertical-center bg">
        <div class="card card-login mx-auto my-6 shadow-lg" style="width: 20rem;">
            <div class="card-header text-center">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <h2>Aplikasi E-Parkir</h2>

                <!-- cek notifikasi -->
                <?php
                if (isset($_GET['pesan'])) {
                    # code...
                    if ($_GET['pesan'] == "gagal") {
                        # code...
                        echo '<div class="alert alert-danger  fade show" role="alert">
                        login gagal username dan password salah
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    } elseif ($_GET['pesan'] == "logout") {
                        # code...
                        echo "Anda berhasil logout";
                    } elseif ($_GET['pesan'] == "belum_login") {
                        # code...
                        echo "
                        Anda harus login untuk mengakses halaman ini";
                    }
                }
                ?>

            </div>
            <div class="card-body">
                <p class="text-center">Sign in to start your session</p>
                <form action="cek_login.php" method="POST">
                    <div class="mb-3 input-group">
                        <!-- <label for="exampleInputEmail1" class="form-label">User Name</label> -->
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="addon-wrapping" name="user_name" required placeholder="Username">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span>
                    </div>
                    <div class="mb-3 input-group">
                        <!-- <label for="exampleInputPassword1" class="form-label">Password</label> -->
                        <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password" required aria-describedby="password">
                        <span class="input-group-text" id="password"><i class="fas fa-lock"></i></span>
                    </div>

                    <button type="submit" class="btn btn-primary float-end">Masuk <i class="fas fa-sign-in-alt"></i></button>
                </form>
            </div>



        </div>
    </div>
    <!-- </div> -->
    <!-- js -->
    <script src="assets/js/boostrab/bootstrap.bundle.js"></script>
</body>

</html>