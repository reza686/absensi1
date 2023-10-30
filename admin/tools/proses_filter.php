<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["filter"])) {
    $filter = $_POST["filter"];

   
    $query = "SELECT id_pegawai, nama, tanggal, jam, keterangan FROM absensi";

    
    if ($filter !== "semua") {
        $query .= " WHERE keterangan = ?";
    }

    
    if ($stmt = mysqli_prepare($db, $query)) {
        
        if ($filter !== "semua") {
            mysqli_stmt_bind_param($stmt, "s", $filter);
        }

        
        mysqli_stmt_execute($stmt);

        
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            
            echo "<table>";
            echo "<tr><th>NRP</th><th>Nama</th><th>Tanggal</th><th>Jam</th><th>Keterangan</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>{$row['id_pegawai']}</td><td>{$row['nama']}</td><td>{$row['tanggal']}</td><td>{$row['jam']}</td><td>{$row['keterangan']}</td></tr>";
            }

            echo "</table>";
        } else {
            echo "Terjadi kesalahan dalam mengambil data.";
        }

        
        mysqli_stmt_close($stmt);
    }
}
?>
