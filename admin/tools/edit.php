<?php
include('config.php');

if (!isset($_GET['id_pegawai'])) {
    header('Location: ../data_karyawan.php');
}

$id_pegawai = $_GET['id_pegawai'];

$sql = "SELECT p.*, pangkat.nama_pangkat, jabatan.nama_jabatan
        FROM polri p
        LEFT JOIN pangkat ON p.pangkat = pangkat.id_pangkat
        LEFT JOIN jabatan ON p.jabatan = jabatan.id_jabatan
        WHERE p.id_pegawai = $id_pegawai";

$query = mysqli_query($db, $sql);
$user_data = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) < 1) {
    die("Data tidak ditemukan");
}
?>

<?php include 'header.php'; ?>

<body>
<div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="menu.php"><img src="/admin/assets/images/hutri78.png" alt="logo"></a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle " src="/admin/assets/images/presisi.png" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">Admin</h5>
                <span></span>
              </div>
            </div>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            </div>
          </div>
        </li>
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="../menu.php">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Menu</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="../data_karyawan.php">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Data Pegawai</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="../laporan.php">
            <span class="menu-icon">
              <i class="mdi mdi-chart-bar"></i>
            </span>
            <span class="menu-title">Laporan</span>
          </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="../rekap.php">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Rekap Absen</span>
            </a>
          </li>
      </ul>
    </nav>
    <div class="container-fluid page-body-wrapper">
        <?php include 'nav.php'; ?>
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
                                <h4 class="card-title">Edit Data Pegawai</h4>
                                <form action="proses_edit.php" method="POST" name="form1">
                                    <form class="forms-sample">
                                        <div class="form-group">
                                            <label for="id">NRP</label>
                                            <input type="hidden" class="form-control" name="id_pegawai" placeholder="NRP" value="<?php echo $_GET['id_pegawai']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $user_data['nama'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Kata Sandi Baru</label>
                                            <input type="password" class="form-control" name="password" placeholder="Kata Sandi Baru">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <?php $jenis_kelamin = $user_data['jenis_kelamin']; ?>
                                            <select class="form-control" name="jenis_kelamin">
                                                <option <?php echo ($jenis_kelamin == 'Laki-Laki') ? "selected" : "" ?>>Laki-Laki</option>
                                                <option <?php echo ($jenis_kelamin == 'Perempuan') ? "selected" : "" ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pangkat">Pangkat</label>
                                            <select class="form-control" name="pangkat">
                                                <option value="">Pilih Pangkat</option>
                                                <?php
                                                $sql_pangkat = "SELECT * FROM pangkat";
                                                $result_pangkat = mysqli_query($db, $sql_pangkat);
                                                while ($row_pangkat = mysqli_fetch_assoc($result_pangkat)) {
                                                    $selected = ($row_pangkat['id_pangkat'] == $pangkat) ? "selected" : "";
                                                    echo "<option value='" . $row_pangkat['id_pangkat'] . "' $selected>" . $row_pangkat['nama_pangkat'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                            <select class="form-control" name="jabatan">
                                                <option value="">Pilih Jabatan</option>
                                                <?php
                                                $sql_jabatan = "SELECT * FROM jabatan";
                                                $result_jabatan = mysqli_query($db, $sql_jabatan);
                                                while ($row_jabatan = mysqli_fetch_assoc($result_jabatan)) {
                                                    $selected = ($row_jabatan['id_jabatan'] == $jabatan) ? "selected" : "";
                                                    echo "<option value='" . $row_jabatan['id_jabatan'] . "' $selected>" . $row_jabatan['nama_jabatan'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit">Update</button>
                                        <button class="btn btn-dark" href="../data_karyawan.php">Cancel</button>
                                      </form>
                                </form>
                            </div>
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
    <?php include 'script.php'; ?>
</body>