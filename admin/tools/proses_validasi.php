<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $validasi = $_POST['validasi'];
    $id_absensi = $_POST['id_absensi']; 

    if ($validasi === "Ditolak") {
        
        $sql_delete = "DELETE FROM absensi WHERE id_absensi = ?";
        $stmt = $db->prepare($sql_delete);
        $stmt->bind_param("i", $id_absensi);

        if ($stmt->execute()) {
            
            echo "Data berhasil dihapus.";
        } else {
           
            echo "Gagal menghapus data: " . $stmt->error;
        }

        $stmt->close();
        $db->close();
    }

    
    header("Location: ../laporan.php");
    exit();
}
?>
