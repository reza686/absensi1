<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $id_pegawai = $_POST['id_pegawai'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $pangkat_id = $_POST['pangkat']; 
    $jabatan_id = $_POST['jabatan']; 

    
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql_pangkat = "SELECT nama_pangkat FROM pangkat WHERE id_pangkat = '$pangkat_id'";
    $result_pangkat = mysqli_query($db, $sql_pangkat);
    

    $sql_jabatan = "SELECT nama_jabatan FROM jabatan WHERE id_jabatan = '$jabatan_id'";
    $result_jabatan = mysqli_query($db, $sql_jabatan);
    
    if ($result_pangkat && $result_jabatan) {
        $row_pangkat = mysqli_fetch_assoc($result_pangkat);
        $row_jabatan = mysqli_fetch_assoc($result_jabatan);

        $nama_pangkat = $row_pangkat['nama_pangkat'];
        $nama_jabatan = $row_jabatan['nama_jabatan'];

        $sql = "INSERT INTO polri(id_pegawai, nama, password, jenis_kelamin, pangkat, jabatan) VALUES ('$id_pegawai', '$nama', '$hashed_password', '$jenis_kelamin', '$nama_pangkat', '$nama_jabatan')";
        $query = mysqli_query($db, $sql);

        if ($query) {
            header('location: ../data_karyawan.php?status=sukses');
        } else {
            header('location: ../data_karyawan.php?status=gagal');
        }
    } else {
        header('location: ../data_karyawan.php?status=gagal');
    }
} else {
    die("Akses Dilarang");
}
?>
