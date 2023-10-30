<?php include 'tools/header.php';
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
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title"> Tambahkan Data Pegawai</h3>
          <nav aria-label="breadcrumb">
          </nav>
        </div>
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Masukkan Data Pegawai</h4>
                <form action="tools/proses.php" method="POST" name="form1">
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="id">NRP</label>
                      <input type="text" class="form-control" name="id_pegawai" placeholder="NRP">
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="jenis_kelamin">Jenis Kelamin</label>
                      <select class="form-control" name="jenis_kelamin">
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="pangkat">Pangkat</label>
                      <select id="pangkat" name="pangkat" class="form-control" required>
                        <option value="">Pilih Pangkat</option>
                        <?php
                        $sql = "SELECT id_pangkat, nama_pangkat FROM pangkat";
                        $result = mysqli_query($db, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo "<option value='" . $row['id_pangkat'] . "'>" . $row['nama_pangkat'] . "</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="jabatan">Jabatan</label>
                      <select id="jabatan" name="jabatan" class="form-control" required>
                        <option value="">Pilih Jabatan</option>
                        <?php
                        $sql = "SELECT id_jabatan, nama_jabatan FROM jabatan";
                        $result = mysqli_query($db, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo "<option value='" . $row['id_jabatan'] . "'>" . $row['nama_jabatan'] . "</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                    <button class="btn btn-danger btn-sm" type="reset">Reset</button>
                  </form>
                </form>
              </div>
            </div>
          </div>



          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href=""></a></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <?php include 'tools/script.php'; ?>
</body>