<?php
include('koneksi.php');

if (isset($_POST['submit'])) {
    $asset_id = $_POST['id'];
    $asset_jenis = $_POST['jenis'];
    $asset_latitude = $_POST['latitude'];
    $asset_longitude = $_POST['longitude'];
    $asset_jalan = $_POST['jalan'];
    $asset_desa = $_POST['desa'];
    $asset_kecamatan = $_POST['kecamatan'];
    $asset_kabupaten = $_POST['kabupaten'];
    $asset_provinsi = $_POST['provinsi'];
    $asset_luas = $_POST['luas'];
    $asset_klasifikasi = $_POST['klasifikasi'];
    $asset_status = $_POST['status'];
    $asset_deskripsi = $_POST['deskripsi'];
    $asset_harga = $_POST['harga'];
    $foto = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp_name, 'uploads/'.$foto);

    // Prepare SQL statement
    $sql = "UPDATE assets SET 
            jenis='$asset_jenis', 
            latitude='$asset_latitude', 
            longitude='$asset_longitude', 
            jalan='$asset_jalan', 
            desa='$asset_desa', 
            kecamatan='$asset_kecamatan', 
            kabupaten='$asset_kabupaten', 
            provinsi='$asset_provinsi', 
            luas='$asset_luas', 
            klasifikasi='$asset_klasifikasi', 
            status='$asset_status', 
            deskripsi='$asset_deskripsi', 
            harga='$asset_harga',
            foto='$foto'";

    $sql .= " WHERE id='$asset_id'";

    if ($link->query($sql) === TRUE) {
        echo "<script>
                alert('Data asset berhasil diperbarui.');
                window.location.href = 'lihat_asset_admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $sql . "<br>" . $link->error . "');
                window.history.back();
              </script>";
    }

    // Close connection
    $link->close();
}
?>
