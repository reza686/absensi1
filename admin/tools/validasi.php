<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $id_absensi = $_GET["id"];
    
    $validasi_status = $_POST["aksi"][$id_absensi];

   
    $sql = "UPDATE absensi SET validasi_status = ? WHERE id_absensi = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("si", $validasi_status, $id_absensi);

    if ($stmt->execute()) {
        
        if ($validasi_status === "Ditolak") {
            $sql_delete = "DELETE FROM absensi WHERE id_absensi = ?";
            $stmt_delete = $db->prepare($sql_delete);
            $stmt_delete->bind_param("i", $id_absensi);
            $stmt_delete->execute();
        }

        header("Location: ../laporan.php"); 
        exit();
    } else {
        echo "Gagal memproses validasi.";
    }

    $stmt->close();
} else {
    echo "Permintaan tidak valid.";
}
?>
