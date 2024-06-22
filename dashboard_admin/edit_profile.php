<?php
session_start();
include '../connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = $db->query($sql);
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

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
        <div class="container-fluid edit-profile">
            <div class="row">
                <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                                <span data-feather="calendar" class="align-text-bottom"></span>
                                This week
                            </button>
                        </div>
                    </div>
                    <h2 class="mb-4">Edit Data Pegawai Mixue</h2>
                    <form action="action_edit.php" method="post">
                        <input type="hidden" name="id" value=<?= $data[0]['id']; ?>>
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID</label>
                            <input type="number" class="form-control" placeholder="Employee ID" name="employee_id" id="employee_id" value=<?= $data[0]['employee_id']; ?>>
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Fullname</label>
                            <input type="text" class="form-control" placeholder="Fullname" name="fullname" id="fullname" value="<?= ucfirst($data[0]['fullname']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Alamat Lengkap</label>
                            <input type="text" class="form-control" placeholder="Alamat" name="alamat_lengkap" id="alamat_lengkap" value="<?= ucfirst($data[0]['alamat_lengkap']) ?>">
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
                            <label for="fullname" class="form-label">No Handphone</label>
                            <input type="text" class="form-control" placeholder="No Handphone" name="no_hp" id="no_hp" value="<?= ucfirst($data[0]['no_hp']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" aria-label="Default select example" name="role" id="role">
                                <optgroup label='Role Sekarang'>
                                    <option selected value="<?= $data[0]['role']; ?>"><?= ucfirst($data[0]['role']) ?></option>
                                </optgroup>
                                <optgroup label="Edit Role">
                                    <option value="admin">Admin</option>
                                    <option value="KepalaToko">Kepala Toko</option>
                                    <option value="CrewStore">Crew Store</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" placeholder="******" name="password" id="password" value="<?= $data[0]['password']; ?>">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-info mx-1">Edit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <a class="btn btn-danger" href="profile_pegawai.php">Batal</a>
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

</html>