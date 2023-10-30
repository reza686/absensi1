<?php
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
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Welcome</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"></span>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <?php include 'tools/script.php'; ?>
</body>