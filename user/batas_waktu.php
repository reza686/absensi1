<?php

$waktu_sekarang = date("H:i:s:c");

$batasan_jam_masuk = "08:00:00";
$batasan_jam_pulang = "15:00:00";

$jam_masuk = $_POST["jam_masuk"];
$jam_pulang = $_POST["jam_pulang"];


if (strtotime($jam_masuk) >= strtotime($batasan_jam_masuk)) {
    
    if (strtotime($jam_pulang) >= strtotime($batasan_jam_pulang)) {
        
        echo "Absen berhasil!";
    } else {
        echo "Jam pulang harus setelah atau sama dengan jam $batasan_jam_pulang.";
    }
} else {
    echo "Jam masuk harus setelah atau sama dengan jam $batasan_jam_masuk.";
}
