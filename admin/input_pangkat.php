<?php include 'tools/header.php';
include 'tools/config.php';
?>

<body>
<?php include 'tools/sidebar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include 'tools/nav.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Tambah Kategori Pangkat</h3>
            <nav aria-label="breadcrumb">
            </nav>
          </div>
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form action="tools/kategori_pangkat.php" method="POST" name="">
                    <form class="forms-sample">
                      <div class="form-group">
                      <input type="hidden" name="id_pangkat" value="auto">
                        <label for="nama_pangkat">Nama Pangkat:</label>
                        <input type="text" class="form-control" name="nama_pangkat" placeholder="Isi Pangkat" required>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" value="tambah">Tambah</button>
                    </form>
                  </form>
                  <?php 
                  $sql = "SELECT * FROM pangkat";
                  $result = $db->query($sql);
                  
                  if ($result->num_rows > 0) {
                      echo "<p>Daftar Pangkat:</p>";
                      echo "<table border='1' class=table table-bordered>
                              <tr>
                                  <th>Nama Kategori</th>
                                  <th>Aksi</th>
                              </tr>";
                  
                      while ($row = $result->fetch_assoc()) {
                          echo "<tr>
                                  <td>" . $row["nama_pangkat"] . "</td>
                                  <td>
                                      <a href='tools/edit_pangkat.php?id=" . $row["id_pangkat"] . "'>Edit</a>
                                      <a href='tools/hapus_pangkat.php?id=" . $row["id_pangkat"] . "'>Hapus</a>
                                  </td>
                              </tr>";
                      }
                  
                      echo "</table>";
                  } else {
                      echo "Belum ada kategori pangkat.";
                  }
                  
                  $db->close();
                  ?>
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