<?php

include '../admin/tools/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $id_pegawai = $_POST["id_pegawai"];
    $password = $_POST["password"];


    $sql = "SELECT * FROM polri WHERE id_pegawai = '$id_pegawai'";
    $result = mysqli_query($db, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $user_data = mysqli_fetch_assoc($result);

 
        if (password_verify($password, $user_data['password'])) {
           
            session_start();
            $_SESSION['id_pegawai'] = $id_pegawai;
            $_SESSION['nama'] = $user_data['nama'];
            header('location: dashboard.php'); 
        } else {
            
            header('location: login_user.php?pesan=Password_salah');
        }
    } else {
       
        header('location: login_user.php?pesan=ID_Pegawai_tidak_ditemukan');
    }
} else {
    
    header('location: login_user.php');
}
?>
