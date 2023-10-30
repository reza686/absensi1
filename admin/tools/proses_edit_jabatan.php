<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_jabatan"]) && isset($_POST["nama_jabatan"])) {
    $id_jabatan = $_POST["id_jabatan"];
    $nama_jabatan = $_POST["nama_jabatan"];

    
    $sql = "UPDATE jabatan SET nama_jabatan = '$nama_jabatan' WHERE id_jabatan = $id_jabatan";

    if ($db->query($sql) === TRUE) {
        header('location: ../input_jabatan.php');
        echo "Perubahan berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
} else {
    echo "Permintaan tidak valid.";
}
?>
