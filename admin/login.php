<?php include 'tools/config.php';
include 'tools/header.php';
?>



<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Login</h3>
               <form method="POST" action="tools/proses_login.php">
                <div class="form-group">
                  <label>ID</label>
                  <input type="text" name="id_pegawai" class="form-control p_input">
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control p_input">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control p_input">
                </div>

                <div class="text-center">
                  <button type="submit" name="login" class="btn btn-primary btn-block enter-btn">Login</button>
                </div>
                <nav>
                  <ul>
                    <li><a href="../user/absen_masuk.php">Halaman user</a></li>
                  </ul>
                </nav>
              </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <?php include 'tools/script.php'; ?>
  <!-- endinject -->
</body>