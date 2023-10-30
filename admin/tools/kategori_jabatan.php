<?php
include 'config.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $nama_jabatan = $_POST["nama_jabatan"];

   
    $sql = "INSERT INTO jabatan(nama_jabatan) VALUE ('$nama_jabatan')";
    $query = mysqli_query($db, $sql);
    
    header("Location: ../input_jabatan.php");
    exit();
}
?>
