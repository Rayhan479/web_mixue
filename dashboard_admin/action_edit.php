<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $employee_id = intval($_POST['employee_id']);
    $fullname = $db->real_escape_string($_POST['fullname']);
    $alamat_lengkap = $db->real_escape_string($_POST['alamat_lengkap']);
    $jenis_kelamin = $db->real_escape_string($_POST['jenis_kelamin']);
    $no_hp = $db->real_escape_string($_POST['no_hp']);
    $role = $db->real_escape_string($_POST['role']);
    $password = $db->real_escape_string($_POST['password']);

    // Update query dengan prepared statement
    $stmt = $db->prepare("UPDATE users SET employee_id = ?, fullname = ?, alamat_lengkap = ?, jenis_kelamin = ?, no_hp = ?, role = ?, password = ? WHERE id = ?");
    if ($stmt === false) {
        echo "Error in preparing statement: " . $db->error;
        exit;
    }
    
    // Perbaiki urutan jenis data di bind_param
    $stmt->bind_param("issssssi", $employee_id, $fullname, $alamat_lengkap, $jenis_kelamin, $no_hp, $role, $password, $id);

    if ($stmt->execute()) {
        header("Location: profile_pegawai.php?message=Data berhasil diupdate");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement setelah digunakan
    $stmt->close();
}

