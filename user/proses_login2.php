<?php
session_start();
include '../admin/tools/config.php'; // Sesuaikan dengan nama file konfigurasi database Anda
if (isset($_POST['submit'])) {
    $id_pegawai = $_POST['id_pegawai'];
    $password = $_POST['password'];

    // Cari pegawai berdasarkan ID pegawai
    $query = "SELECT * FROM polri WHERE id_pegawai = '$id_pegawai' AND  password= '$password'";
    $result = mysqli_query($db, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row['password'];

            // Verifikasi kata sandi
            if (password_verify($password, $stored_password)) {
                // Password cocok, redirect ke halaman dashboard atau tindakan sesuai
                header('location: dashboard.php');
            } else {
                // Password salah, tampilkan pesan kesalahan
                header('location: login_user.php?pesan=password_salah');
            }
        } else {
            // ID pegawai tidak ditemukan, tampilkan pesan kesalahan
            header('location: login_user.php?pesan=id_pegawai_tidak_ditemukan');
        }
    } else {
        // Kesalahan dalam query SQL, tampilkan pesan kesalahan
        header('location: login_user.php?pesan=gagal_query');
    }
} else {
    die("Akses Dilarang");
}
