<?php
include 'config.php';
include 'header.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_pangkat = $_GET['id'];

    
    $sql = "SELECT * FROM pangkat WHERE id_pangkat = $id_pangkat";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama_pangkat = $row['nama_pangkat'];
    } else {
        echo "Kategori pangkat tidak ditemukan.";
    }

    $db->close();
} else {
    echo "ID kategori pangkat tidak valid.";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Kategori Pangkat</title>
</head>

<body>
    <h4>Edit Kategori Pangkat</h4>
    <form method="POST" action="proses_edit_pangkat.php">
        <input type="hidden" name="id_pangkat" value="<?php echo $id_pangkat; ?>">
        <label for="nama_kategori">Nama Kategori:</label>
        <input type="text" id="nama_pangkat" name="nama_pangkat" value="<?php echo $nama_pangkat; ?>" required><br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>