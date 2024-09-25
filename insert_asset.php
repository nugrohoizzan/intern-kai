<?php
include('koneksi.php');

if (isset($_POST['submit'])) {
    $asset_id = mysqli_real_escape_string($link, $_POST['id']);
    $asset_jenis = mysqli_real_escape_string($link, $_POST['jenis']);
    $asset_latitude = mysqli_real_escape_string($link, $_POST['latitude']);
    $asset_longitude = mysqli_real_escape_string($link, $_POST['longitude']);
    $asset_provinsi = mysqli_real_escape_string($link, $_POST['provinsi']);
    $asset_kabupaten = mysqli_real_escape_string($link, $_POST['kabupaten']);
    $asset_kecamatan = mysqli_real_escape_string($link, $_POST['kecamatan']);
    $asset_desa = mysqli_real_escape_string($link, $_POST['desa']);
    $asset_jalan = mysqli_real_escape_string($link, $_POST['jalan']);

    // Hilangkan pemisah ribuan dan ubah menjadi float
    $asset_luas = str_replace('.', '', $_POST['luas']);
    $asset_luas = floatval($asset_luas);

    $asset_klasifikasi = mysqli_real_escape_string($link, $_POST['klasifikasi']);
    $asset_status = mysqli_real_escape_string($link, $_POST['status']);
    $asset_deskripsi = mysqli_real_escape_string($link, $_POST['deskripsi']);

    // Hilangkan pemisah ribuan dan ubah menjadi float
    $asset_harga = str_replace('.', '', $_POST['harga']);
    $asset_harga = floatval($asset_harga);

    // Handle upload file
    $foto = $_FILES['foto']['name'];
    $temp = $_FILES['foto']['tmp_name'];
    $folder = "uploads/";

    if (move_uploaded_file($temp, $folder . $foto)) {
        $sql = "INSERT INTO assets (id, jenis, latitude, longitude, jalan, desa, kecamatan, kabupaten, provinsi, luas, klasifikasi, status, deskripsi, harga, foto)
                VALUES ('$asset_id', '$asset_jenis', '$asset_latitude', '$asset_longitude', '$asset_jalan', '$asset_desa', '$asset_kecamatan', '$asset_kabupaten', '$asset_provinsi', '$asset_luas', '$asset_klasifikasi', '$asset_status', '$asset_deskripsi', '$asset_harga', '$foto')";

        if ($link->query($sql) === TRUE) {
            echo "<script>alert('Asset berhasil ditambahkan');</script>";
            if ($asset_klasifikasi === 'Station') {
                header("Location: tambah_blok.php?asset_id=$asset_id");
            } else {
                header("Location: lihat_asset_admin.php");
            }
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $link->error;
        }
    } else {
        echo "Gagal mengunggah foto.";
    }

    // Tutup koneksi
    $link->close();
}
?>
