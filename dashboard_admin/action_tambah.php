<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = intval($_POST['employee_id']);
    $fullname = $db->real_escape_string($_POST['fullname']);
    $alamat_lengkap = $db->real_escape_string($_POST['alamat_lengkap']);
    $jenis_kelamin = $db->real_escape_string($_POST['jenis_kelamin']);
    $no_hp = isset($_POST['no_hp']) ? $db->real_escape_string($_POST['no_hp']) : '';
    $role = $db->real_escape_string($_POST['role']);
    $password = $db->real_escape_string($_POST['password']);

    // Enkripsi password
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Gunakan prepared statement untuk query
    $stmt = $db->prepare("INSERT INTO users (employee_id, fullname, alamat_lengkap, jenis_kelamin, no_hp, role, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $employee_id, $fullname, $alamat_lengkap, $jenis_kelamin, $no_hp, $role, $password_hashed);

    if ($stmt->execute()) {
        header("Location: index.php?message=Data User berhasil ditambah!");
    } else {
        header("Location: index.php?message=Data user gagal ditambah! Error: " . $stmt->error);
    }

    $stmt->close();
    $db->close();
}
?>

