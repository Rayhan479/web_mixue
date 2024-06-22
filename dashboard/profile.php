<?php
include "../connection.php";
include "../Users.php";
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location:../index.php?message=Anda telah Logout");
}

if ($_SESSION['role'] == "admin") {
    header("Location:../dashboard_admin/index.php");
}

if (!isset($_SESSION['status'])) {
    header("Location:../index.php?message=Anda belum Login");
}

$tgl = date('Y-m-d');

?> 

<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Halaman Absensi</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .navbar-nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
            color: #ffffff;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="profile.css" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0 absensi">PROFILE PEGAWAI</h3>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link fw-bold py-2 px-2" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link fw-bold py-2 px-2" aria-current="page" href="rekap_absen.php">Riyawat Absen</a>
                    <a class="nav-link fw-bold py-2 px-2 active" aria-current="page" href="profile.php">Profile</a>
                    <a class="nav-link fw-bold py-1 px-0" href="#">
                        <form action="" method="POST">
                            <button type="submit" name="logout" class="btn btn-outline-light">LOGOUT</button>
                        </form>
                    </a>
                </nav>
            </div>
        </header>



    



    <div class="row">
        <div class="col-md-4 mt-1">
            <div class="card text-center sidebar">
                <div class="card-body">
                    
                    <img src="../img/user.png" class="rounded-circle" width="200px" alt="">
                    <div class="mt-3">
                        <h3><?php echo $_SESSION['fullname']; ?></h3>
                        <p>ID Pegawai : <?php echo $_SESSION['employee_id'] ?></p>
                        <button type="button" class="btn btn-outline-light">Edit Foto Profile</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-1">
            <div class="card mb-3 content">
                <h1 class="m-3 pt-3">Profile Pegawai</h1>
                <div class="card-body text-start ">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Nama Lengkap</h5>
                        </div>
                        <div class="col-md-8 text-secondary">
                        <?php echo $_SESSION['fullname']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Alamat Lengkap</h5>
                        </div>
                        <div class="col-md-8 text-secondary">
                        <?php echo $_SESSION['alamat_lengkap']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Jenis Kelamin</h5>
                        </div>
                        <div class="col-md-8 text-secondary">
                        <?php echo $_SESSION['jenis_kelamin']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Nomor Handphone</h5>
                        </div>
                        <div class="col-md-8 text-secondary">
                        <?php echo $_SESSION['no_hp']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Jabatan</h5>
                        </div>
                        <div class="col-md-8 text-secondary">
                        <?php echo ucfirst($_SESSION['role'])  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        
        

        <footer class="mt-auto text-white-50">
            <p>Created By Kelompok 9</p>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>