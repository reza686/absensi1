<?php
include 'config.php';
include 'header.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_jabatan = $_GET['id'];

   
    $sql = "SELECT * FROM jabatan WHERE id_jabatan = $id_jabatan";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama_jabatan = $row['nama_jabatan'];
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
    <form method="POST" action="proses_edit_jabatan.php">
        <input type="hidden" name="id_jabatan" value="<?php echo $id_jabatan; ?>">
        <label for="nama_kategori">Nama Kategori:</label>
        <input type="text" id="nama_jabatan" name="nama_jabatan" value="<?php echo $nama_jabatan; ?>" required><br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>