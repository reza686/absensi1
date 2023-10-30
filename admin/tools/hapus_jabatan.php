<?php
include 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_jabatan = $_GET['id'];


    $sql = "DELETE FROM jabatan WHERE id_jabatan = $id_jabatan";

    if ($db->query($sql) === TRUE) {
        header('location: ../input_jabatan.php');
        echo "Kategori pangkat berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
} else {
    echo "ID kategori pangkat tidak valid.";
}
?>
