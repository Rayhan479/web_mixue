<?php
session_start();
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location:../index.php?message=Anda telah Logout");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Dashboard Template · Bootstrap v5.3</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">





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

<nav class="sidebar ">
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
                        <a href="tambah_pegawai.php" >
                            <i class='bx bxs-book-add icon' ></i>
                        <span class="text nav-text ">Tambah Pegawai</span>
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
        <div class="container-fluid tambah-pegawai">
            <div class="row">
                <main class="col-md-11 ms-sm-auto col-lg-12 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Tambah Data Pegawai</h1>
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
                    <h2 class="mb-4 tambah">Tambah Data Pegawai Mixue</h2>
                    <form action="action_tambah.php" method="POST">
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID</label>
                            <input type="number" class="form-control" placeholder="Employee ID" name="employee_id" id="employee_id">
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Fullname" name="fullname" id="fullname">
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Alamat Lengkap</label>
                            <input type="text" class="form-control" placeholder="Alamat" name="alamat_lengkap" id="alamat_lengkap">
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Jenis Kelamin</label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L">
                            <label class="form-check-label" for="flexRadioDefault1">Laki-Laki</label>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P">
                            <label class="form-check-label" for="flexRadioDefault1">Perempuan</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">No Handphone</label>
                            <input type="number" class="form-control" placeholder="No Handphone" name="no_hp" id="no_hp">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Jabatan</label>
                            <select class="form-select" aria-label="Default select example" name="role" id="role">
                                <option value="admin">Admin</option>
                                <option value="Crew Store">Crew Store</option>
                                <option value="Kepala toko">Kepala toko</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" placeholder="******" name="password" id="password">
                        </div>
                        <div class=" col-12">
                            <button type="submit" class="btn btn-primary mx-1">Tambah</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
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
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>