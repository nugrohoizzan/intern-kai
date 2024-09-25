<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php?pesan=belum_login");
    exit();
}

// Koneksi ke database
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $asset_id = mysqli_real_escape_string($link, $_POST['asset_id']);
    $id_blok = mysqli_real_escape_string($link, $_POST['id_blok']);
    $nama_blok = mysqli_real_escape_string($link, $_POST['nama_blok']);
    $alias = mysqli_real_escape_string($link, $_POST['alias']);
    $area = mysqli_real_escape_string($link, $_POST['area']);
    $dimension = mysqli_real_escape_string($link, $_POST['dimension']);
    $best_use = mysqli_real_escape_string($link, $_POST['best_use']);
    $deskripsi = mysqli_real_escape_string($link, $_POST['deskripsi']);

    // Handle upload file
    $foto = $_FILES['foto']['name'];
    $temp = $_FILES['foto']['tmp_name'];
    $folder = "uploads/";


    if (move_uploaded_file($temp, $folder . $foto)) {
        // Insert data blok ke database
        $sql = "INSERT INTO blok (id_blok, asset_id, nama_blok, alias, area, dimension, best_use, deskripsi, foto) 
                VALUES ('$id_blok', '$asset_id', '$nama_blok', '$alias', '$area', '$dimension', '$best_use', '$deskripsi', '$foto')";

        if (mysqli_query($link, $sql)) {
            echo "<script>
                if (confirm('Apakah Anda ingin menambahkan blok lagi?')) {
                    window.location.href = 'tambah_blok.php?asset_id=$asset_id';
                } else {
                    window.location.href = 'lihat_asset_admin.php?pesan=berhasil_tambah_blok';
                }
                </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }
    } else {
        echo "Gagal mengunggah foto.";
    }
}

mysqli_close($link);
?>
