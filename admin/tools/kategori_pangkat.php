<?php
include 'config.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
 
    $nama_pangkat = $_POST["nama_pangkat"];


    $sql = "INSERT INTO pangkat(nama_pangkat) VALUE ('$nama_pangkat')";
    $query = mysqli_query($db, $sql);
    
    header("Location: ../input_pangkat.php");
    exit();
}
?>
