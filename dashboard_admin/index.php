<!-- <?php
session_start();
include '../connection.php';

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location:../index.php?message=Anda telah Logout");
}

if (isset($_GET['message'])) {
    echo "<script>
        alert(`$_GET[message]`)
    </script>";
}


// Mengambil jumlah keseluruhan pegawai
$query_total_pegawai = "SELECT COUNT(*) AS total_pegawai FROM users WHERE role IN ('CrewStore', 'KepalaToko')";
$result_total_pegawai = $db->query($query_total_pegawai);
$total_pegawai = 0;
if ($result_total_pegawai && $result_total_pegawai->num_rows > 0) {
    $row = $result_total_pegawai->fetch_assoc();
    $total_pegawai = $row['total_pegawai'];
}

$query_total_admin = "SELECT COUNT(*) AS total_admin FROM users WHERE role = 'admin'";
$result_total_admin = $db->query($query_total_admin);
$total_admin = 0;
if ($result_total_admin && $result_total_admin->num_rows > 0) {
    $row = $result_total_admin->fetch_assoc();
    $total_admin = $row['total_admin'];
}

$tanggal_hari_ini = date('Y-m-d');
$query_absen_hari_ini = "SELECT COUNT(*) AS jumlah_absen_hari_ini FROM attendances WHERE DATE(tgl) = '$tanggal_hari_ini'";
$result_absen_hari_ini = $db->query($query_absen_hari_ini);
$jumlah_absen_hari_ini = 0;
if ($result_absen_hari_ini && $result_absen_hari_ini->num_rows > 0) {
    $row = $result_absen_hari_ini->fetch_assoc();
    $jumlah_absen_hari_ini = $row['jumlah_absen_hari_ini'];
}
?> -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Dashboard Template · Bootstrap v5.3</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>


    <!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->

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

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="main.css" rel="stylesheet">
</head>

<body>

   
    <!-- class ="sidebar close" -->
    <nav class="sidebar"> 
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../img/mixue.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">MIXUE</span>
                    <span class="profession">Web Absensi</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu " >

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="index.php">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="data_absen.php">
                        <i class='bx bx-bar-chart-alt-2 icon'></i>
                        <span class="text nav-text">Data Absensi</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="profile_pegawai.php">
                            <i class='bx bx-user icon' ></i>
                        <span class="text nav-text">Profile Pegawai</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="tambah_pegawai.php">
                            <i class='bx bxs-book-add icon' ></i>
                        <span class="text nav-text">Tambah Pegawai</span>
                        </a>
                    </li>


                </ul>
            </div>

            <div class="bottom-content">

                <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
                </li>

            </div>
        </div>
    </nav>

    

    <section class="home">
        <div class="container-fluid">
            <div class="row">
                <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Home</h1>

                        <div class="btn-group dropstart">
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border: none; background: none;">
                                <img src="../img/user.jpeg" class="rounded-circle" width="40px" alt="User">
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li class="dropdown-header">
                                    <img src="../img/user.jpeg" class="profile-img" alt="User">
                                    <h6 class="mt-2"><?= $_SESSION['fullname']; ?></h6>
                                    <span class="badge bg-success level-badge">Jabatan: <?php echo ucfirst($_SESSION['role'])  ?></span>
                                </li>


                                <div class="navbar-nav">
                                    <div class="nav-item text-nowrap">
                                        <form action="" method="post">
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#"><i class='bx bx-user icon' ></i> Profile</a></li>
                                            <li>
                                                <button class="dropdown-item" type="submit" name='logout'>
                                                    <i class='bx bx-log-out icon'></i> Keluar
                                                </button>
                                            </li>
                                            
                                        </form>
                                    </div>
                                </div>
                            </ul>
                        </div>


                    </div>
                    <div class="p-5 mb-4 bg-light rounded-3">
                        <div class="container-fluid">
    
    
                        <div class="row">
                            <div class="col-md-3 col-lg-4 mb-3 mb-sm-0">
                                <div class="card card-pegawai" >
                                    <div class="card-body ">
                                        <img class="mb-3" src="../img/ipegawai.png">
                                        <h3 class="card-title"><?= $total_pegawai; ?></h3>
                                        <p class="card-text">Jumlah Pegawai</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-4 mb-3 mb-sm-0">
                                <div class="card card-admin" >
                                    <div class="card-body">
                                        <img class="mb-3" src="../img/iadmin.png" >
                                        <h3 class="card-title"><?= $total_admin; ?></h3>
                                        <p class="card-text">Jumlah Admin</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-4 mb-3 mb-sm-0">
                                <div class="card card-absen" >
                                    <div class="card-body">
                                        <img class="mb-3" src="../img/iabsen.png" >
                                        <h3 class="card-title"><?= $jumlah_absen_hari_ini; ?></h3>
                                        <p class="card-text">Jumlah Absen Hari Ini</p>                                                              
                                    </div>
                                </div>
                            </div>                      
                        </div>
    
                            <h1 class="display-5 fw-bold">Halo, Admin <?= $_SESSION['fullname']; ?> 👋</h1>
                            <p class="col-md-8 fs-4">Anda sekarang telah masuk sebagai admin, Anda sekarang memiliki beberapa fitur yang dapat digunakan, seperti melihat data absensi dan profile pegawai serta dapat menambah user pegawai.</p>
                            
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section>

    <script>
        const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");
        toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        })
        modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark");
        if (body.classList.contains("dark")) {
            modeText.innerText = "Light mode";
        } else {
            modeText.innerText = "Dark mode";
        }
        });
    </script>

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
    </svg>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>

</html>