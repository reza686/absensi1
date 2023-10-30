<?php
include 'tools/header.php';
include 'tools/config.php';

?>

<body>
  <?php include 'tools/sidebar.php'; ?>
  <div class="container-fluid page-body-wrapper">
    <?php include 'tools/nav.php'; ?>
    <div class="main-panel">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Polri</h4>
            <p class="card-description"> Data Polri BID TIK Polda Kalimantan Selatan</p>
            <?php if (isset($_GET['status'])) : ?>
              <p>
                <?php
                if ($_GET['status'] == 'sukses') {
                  echo "berhasil!";
                } else {
                  echo "gagal!";
                }
                ?>
              </p>
            <?php endif; ?>
            <div class="table-responsive">
              <table border="1" class="table table-bordered">
                <thead>
                  <tr>
                    <th> No.</th>
                    <th> NRP </th>
                    <th> Nama Lengkap </th>
                    <th> Jenis Kelamin </th>
                    <th> Pangkat </th>
                    <th> Jabatan </th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $sql = "SELECT * FROM polri";
                  $query = mysqli_query($db, $sql);
                  $nomor = 0;
                  while ($user_data = mysqli_fetch_array($query)) {
                    $nomor++;
                    echo "<tr>";
                    echo "<td>" . $nomor . "</td>";
                    echo "<td>" . $user_data['id_pegawai'] . "</td>";
                    echo "<td>" . $user_data['nama'] . "</td>";
                    echo "<td>" . $user_data['jenis_kelamin'] . "</td>";
                    echo "<td>" . $user_data['pangkat'] . "</td>";
                    echo "<td>" . $user_data['jabatan'] . "</td>";

                    echo "<td><a href='tools/edit.php?id_pegawai=$user_data[id_pegawai]'>Edit</td></a>";
                    echo "<td><a href='tools/delete.php?id_pegawai=$user_data[id_pegawai]'>Hapus</td></a></tr>";
                  }
                  ?>

                  <p>Total : <?php echo mysqli_num_rows($query) ?></p>
                  <button class="btn btn-dark"><a href="input_user.php">Tambah Pegawai</a></button>
                  <button class="btn btn-dark"><a href="input_pangkat.php">Tambah Kategori Pangkat</a></button>
                  <button class="btn btn-dark"><a href="input_jabatan.php">Tambah Kategori Jabatan</a></button>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php include 'tools/script.php'; ?>
</body>