<?php

include('config.php');

if (isset($_GET['id_pegawai'])) {


    $id_pegawai = $_GET['id_pegawai'];

    $sql = "DELETE FROM polri WHERE id_pegawai=$id_pegawai";
    $query = mysqli_query($db, $sql);


    if ($query) {
        header('location: ../data_karyawan.php');
    } else {
        die("gagal menghapus...");
    }
} else {
    die("akses dilarang");
}
