<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_pangkat"]) && isset($_POST["nama_pangkat"])) {
    $id_pangkat = $_POST["id_pangkat"];
    $nama_pangkat = $_POST["nama_pangkat"];

    
    $sql = "UPDATE pangkat SET nama_pangkat = '$nama_pangkat' WHERE id_pangkat = $id_pangkat";

    if ($db->query($sql) === TRUE) {
        header('location: ../input_pangkat.php');
        echo "Perubahan berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
} else {
    echo "Permintaan tidak valid.";
}
?>
