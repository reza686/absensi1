<?php
include 'tools/header.php';
include 'tools/config.php';
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
            <h4 class="card-title">Daftar Hadir Hari Ini</h4>
            <p class="card-description"> Polri BID TIK Polda KALSEL</p>

            <div class="table-responsive">
              <table class="table table-bordered">
                <tr>
                  <th>No.</th>
                  <th>NRP</th>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>Keterangan</th>
                  <th>Lampiran</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                <?php
                $today = date('Y-m-d');
                $sql = "SELECT * FROM absensi WHERE tanggal = '$today' ORDER BY jam DESC";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                  $nomor = 0;
                  while ($row = $result->fetch_assoc()) {
                    $nomor++;
                ?>
                    <form action="tools/proses_validasi.php" method="POST">
                    <tr>
                      <td><?= $nomor ?></td>
                      <td><?= $row["id_pegawai"] ?></td>
                      <td><?= $row["nama"] ?></td>
                      <td><?= $row["tanggal"] ?></td>
                      <td><?= $row["jam"] ?></td>
                      <td><?= $row["keterangan"] ?></td>
                      <td><a href="../admin/surat/<?php echo $row["lampiran"]; ?>" target="_blank">Lihat Lampiran</a></td>
                      <td>
                        <select name="validasi">
                          <option value="Diterima">Diterima</option>
                          <option value="Ditolak">Ditolak</option>
                        </select>
                      <td>
                        <input type="hidden" name="id_absensi" value="<?= $row['id_absensi'] ?>">
                        <input type="submit" name="submit" value="Submit">
                      </td>
                      </td>
                    </tr>
                    </form>
                <?php
                  }
                } else {
                  echo "<tr><td colspan='8'>Belum ada data kehadiran.</td></tr>";
                }
                ?>
              </table>

              </thead>
              <tbody>
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'tools/script.php'; ?>
</body>