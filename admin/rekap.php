<?php
include 'tools/config.php';
include 'tools/header.php';
session_start();


if (!isset($_SESSION['id_pegawai'])) {
    header('location: login.php');
    exit;
}
?>

<body>
  <?php include 'tools/sidebar.php'; ?>
  <div class="container-fluid page-body-wrapper">
    <?php include 'tools/nav.php'; ?>
    <div class="main-panel">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Rekap Absensi</h4>
            <p class="card-description"> Rekap Absensi per Bulan</p>

            <div class="table-responsive">
              <form method="post" action="">
                <label for="filter_bulan">Bulan:</label>
                <select name="filter_bulan" id="filter_bulan">
                  <option value="">Tampilkan Semua</option>
                  <option value="1">Januari</option>
                  <option value="2">Februari</option>
                  <option value="3">Maret</option>
                  <option value="4">April</option>
                  <option value="5">Mei</option>
                  <option value="6">Juni</option>
                  <option value="7">Juli</option>
                  <option value="8">Agustus</option>
                  <option value="9">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>

                <label for="filter_tahun">Tahun:</label>
                <select name="filter_tahun" id="filter_tahun">
                  <option value="">Tampilkan Semua</option>
                  <option value="2023">2023</option>
                  <option value="2022">2022</option>
                </select>
                <button type="submit">Terapkan Filter</button>
              </form>

              <table class="table table-bordered">
                <tr>
                  <th>Bulan</th>
                  <th>Jumlah Absensi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $filter_bulan = isset($_POST['filter_bulan']) ? $_POST['filter_bulan'] : '';
                  $filter_tahun = isset($_POST['filter_tahun']) ? $_POST['filter_tahun'] : '';

                 
                  $sql = "SELECT MONTH(tanggal) AS bulan, COUNT(*) AS jumlah_absensi FROM absensi";
                  if (!empty($filter_bulan) && !empty($filter_tahun)) {
                    $sql .= " WHERE MONTH(tanggal) = $filter_bulan AND YEAR(tanggal) = $filter_tahun";
                  } elseif (!empty($filter_bulan)) {
                    $sql .= " WHERE MONTH(tanggal) = $filter_bulan";
                  } elseif (!empty($filter_tahun)) {
                    $sql .= " WHERE YEAR(tanggal) = $filter_tahun";
                  }
                  $sql .= " GROUP BY bulan";

                  $result = $db->query($sql);

                  while ($row = $result->fetch_assoc()) {
                    $bulan = $row['bulan'];
                    $jumlah_absensi = $row["jumlah_absensi"];
                    echo "<tr>
                        <td>$bulan</td>
                        <td>$jumlah_absensi</td>
                      </tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>

            <form method="post" action="tools/proses_filter.php">
              <label for="filter">Filter:</label>
              <select name="filter" id="filter">
                <option value="semua">Semua</option>
                <option value="masuk">Masuk</option>
                <option value="izin">Izin</option>
                <option value="sakit">Sakit</option>
                <option value="cuti">Cuti</option>
                <option value="pulang">Pulang</option>
              </select>
              <button type="submit">Terapkan Filter</button>
            </form>

            <?php
            $bulan = isset($_POST['filter_bulan']) ? $_POST['filter_bulan'] : null;
            $tahun = isset($_POST['filter_tahun']) ? $_POST['filter_tahun'] : null;

            $totalMasuk = 0;
            $totalIzin = 0;
            $totalSakit = 0;
            $totalCuti = 0;

            if ($bulan && $tahun) {
              $queryMasuk = "SELECT COUNT(*) AS total_masuk FROM absensi WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND keterangan = 'masuk'";
              $queryIzin = "SELECT COUNT(*) AS total_izin FROM absensi WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND keterangan = 'izin'";
              $querySakit = "SELECT COUNT(*) AS total_sakit FROM absensi WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND keterangan = 'sakit'";
              $queryCuti = "SELECT COUNT(*) AS total_cuti FROM absensi WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND keterangan = 'cuti'";
              $queryPulang = "SELECT COUNT(*) AS total_pulang FROM absensi WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND keterangan = 'pulang'";

              
              $resultMasuk = $db->query($queryMasuk);
              $rowMasuk = $resultMasuk->fetch_assoc();
              $totalMasuk = $rowMasuk['total_masuk'];
              
              $resultIzin = $db->query($queryIzin);
              $rowIzin = $resultIzin->fetch_assoc();
              $totalIzin = $rowIzin['total_izin'];
              
              $resultSakit = $db->query($querySakit);
              $rowSakit = $resultSakit->fetch_assoc();
              $totalSakit = $rowSakit['total_sakit'];
              
              $resultCuti = $db->query($queryCuti);
              $rowCuti = $resultCuti->fetch_assoc();
              $totalCuti = $rowCuti['total_cuti'];

              $resultPulang = $db->query($queryPulang);
              $rowPulang = $resultPulang->fetch_assoc();
              $totalPulang = $rowPulang['total_pulang'];
            }
            
            ?>
            <p>Total Masuk: <?php echo $totalMasuk; ?></p>
            <p>Total Izin: <?php echo $totalIzin; ?></p>
            <p>Total Sakit: <?php echo $totalSakit; ?></p>
            <p>Total Cuti: <?php echo $totalCuti; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php include 'tools/script.php'; ?>
</body>