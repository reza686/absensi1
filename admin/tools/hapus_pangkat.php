<?php
include 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_pangkat = $_GET['id'];


    $sql = "DELETE FROM pangkat WHERE id_pangkat = $id_pangkat";

    if ($db->query($sql) === TRUE) {
        header('location: ../input_pangkat.php');
        echo "Kategori pangkat berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
} else {
    echo "ID kategori pangkat tidak valid.";
}
?>
