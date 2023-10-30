$(document).ready(function() {
    $("#btnFilter").click(function() {
        var bulan = $("#bulan").val();
        var tahun = $("#tahun").val();

        // Validasi input bulan dan tahun sesuai kebutuhan
        // Misalnya, pastikan tahun adalah angka yang valid dan bulan adalah angka 01-12

        // Buat query SQL berdasarkan bulan dan tahun yang dipilih
        var query = "SELECT id_pegawai, nama, tanggal, jam, jenis_absen, keterangan FROM absensi WHERE MONTH(tanggal) = '" + bulan + "' AND YEAR(tanggal) = '" + tahun + "'";

        // Lakukan permintaan AJAX untuk mengambil data berdasarkan query
        $.ajax({
            url: "laporan.php", // Ganti dengan skrip PHP yang memproses query dan mengembalikan data absensi
            type: "POST",
            data: { query: query },
            success: function(response) {
                // Tampilkan data hasil filter ke dalam tabel rekap
                $("#tabelAbsensi tbody").php(response);
            }
        });
    });
});
