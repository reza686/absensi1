<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pegawai = $_POST['id_pegawai'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE id_pegawai = '$id_pegawai' AND username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $admin_data = mysqli_fetch_assoc($result);

        $_SESSION['id_pegawai'] = $id_pegawai;
        $_SESSION['username'] = $username;
        header('location: ../menu.php');
    } else {
        header('location: ../login.php?status=gagal');
    }
} else {
    header('location: ../login.php');
}
?>
