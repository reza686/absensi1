<?php
include 'config.php';


if (isset($_GET["id_absensi"])) {
    $id_absensi = $_GET["id_absensi"];

    
    $sql = "UPDATE absensi SET status = 'Ditolak' WHERE id_absensi = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id_absensi);

    if ($stmt->execute()) {
        header("Location: ../laporan.php"); 
        exit();
    } else {
        echo "Gagal menolak entri.";
    }

    $stmt->close();
} else {
    echo "ID entri tidak valid.";
}
?>
