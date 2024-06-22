<?php
include "connection.php";
include "Users.php";

session_start();

$user = new Users();

if (isset($_POST['login'])) {
    if (strlen($_POST['nip']) <= 2 || strlen($_POST['password']) <= 2) {
        header("Location:index.php?message=Data inputan tidak valid!");
    } else {
        $user->set_login_data($_POST['nip'], $_POST['password']);

        $id = $user->get_employee_id();
        $password = $user->get_password();

        $sql = "SELECT * FROM users WHERE employee_id = $id";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            //Cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                //data yang akan masuk ke bagian dashboard
                $_SESSION['status'] = "login";
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['alamat_lengkap'] = $row['alamat_lengkap'];
                $_SESSION['jenis_kelamin'] = $row['jenis_kelamin'];
                $_SESSION['no_hp'] = $row['no_hp'];
                $_SESSION['employee_id'] = $row['employee_id'];
                $_SESSION['role'] = $row['role'];

                if ($row['role'] == "admin") {
                    header("Location:dashboard_admin/index.php");
                    exit;
                } else {
                    header("Location:dashboard/index.php");
                    exit;
                }
            } else {
                header("Location:index.php?message=Data tidak ditemukan di database!");
            }
        } else {
            header("Location:index.php?message=Data tidak ditemukan di database!");
        }
    }
}
