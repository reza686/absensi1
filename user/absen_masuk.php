<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="../admin/assets/images/logotik.png">
    <title>Absen Masuk</title>
    <script>
        function updateJamOtomatis() {
            const tanggal = new Date();
            const jam = tanggal.getHours().toString().padStart(2, '0');
            const menit = tanggal.getMinutes().toString().padStart(2, '0');
            const detik = tanggal.getSeconds().toString().padStart(2, '0');
            const jamOtomatis = `${jam}:${menit}:${detik}`;

            document.getElementById("jam_otomatis").textContent = jamOtomatis;
        }

        setInterval(updateJamOtomatis, 1000);

        window.onload = updateJamOtomatis;
    </script>
    <style>
        .radio-group {
            display: flex;
        }

        .radio-group label {
            margin-right: 10px;
        }
    </style>
</head>
<link rel="stylesheet" href="absen.css" />

<body>
<?php
    if (isset($_GET['id_pegawai']) && isset($_GET['nama'])) {
        $id_pegawai = $_GET['id_pegawai'];
        $nama = $_GET['nama'];
    } else {
        $id_pegawai = "";
        $nama = "";
    }
    ?>
    <h1>Absensi TIK Polri</h1>
    <form action="proses_absen.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_absensi" value="auto">
        <label for="nrp">NRP :</label>
        <input type="text" id="id_pegawai" name="id_pegawai" value="<?php echo $id_pegawai; ?>" required>

        
        <input type="hidden" id="nama" name="nama" value="<?php echo $nama; ?>">

        <input type="hidden" id="tanggal" name="tanggal" required>

        <label for="jam">Jam:</label>
        <span id="jam_otomatis" id="jam" name="jam" required></span><br>

        <label for="keterangan"></label>
        <div class="radio-group">
            <input type="radio" name="keterangan" value="masuk" id="masuk">
            <label for="masuk">Masuk</label>
            <input type="radio" name="keterangan" value="izin" id="izin">
            <label for="izin">Izin</label>
            <input type="radio" name="keterangan" value="cuti" id="cuti">
            <label for="cuti">Cuti</label>
            <input type="radio" name="keterangan" value="sakit" id="sakit">
            <label for="sakit">Sakit</label>
            <input type="radio" name="keterangan" value="pulang" id="pulang">
            <label for="pulang">Pulang</label>
        </div><br>
        <label for="lampiran">Lampiran (jika ada):</label>
        <input type="file" id="lampiran" name="lampiran"><br><br>

        <button type="submit">Absen</button>
    </form>

</body>

</html>