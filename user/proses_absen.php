<?php
include '../admin/tools/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pegawai = $_POST["id_pegawai"];
    $nama = $_POST["nama"];
    $tanggal = date("Y-m-d");
    $keterangan = $_POST["keterangan"];
    $lampiran = $_FILES["lampiran"];

    $lampiran_dir = "../admin/surat/";
    $lampiran_nama = $_FILES["lampiran"]["name"];
    $lampiran_tmp = $_FILES["lampiran"]["tmp_name"];

    if (!empty($lampiran_nama)) {
        $lampiran_path = $lampiran_dir . $lampiran_nama;
        move_uploaded_file($lampiran_tmp, $lampiran_path);
    } else {
        $lampiran_path = null;
    }

    $query = "SELECT nama FROM polri WHERE id_pegawai = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $id_pegawai);
    $stmt->execute();
    $stmt->bind_result($nama);
    $stmt->fetch();
    $stmt->close();

    if ($nama) {
        

        $query = "INSERT INTO absensi (id_pegawai, nama, tanggal, jam, keterangan, lampiran) 
                  VALUES (?, ?, ?, NOW(), ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("sssss", $id_pegawai, $nama, $tanggal, $keterangan, $lampiran_nama);
        
        if ($stmt->execute()) {
            if (!empty($lampiran_nama)) {
                $lampiran_path = $lampiran_dir . $lampiran_nama;
                move_uploaded_file($lampiran_tmp, $lampiran_path);
            }
            header('location: absen_masuk.php');
            echo "Absen berhasil!";
        } else {
            echo "Terjadi kesalahan: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "ID pegawai tidak ditemukan.";
    }
}
$db->close();
