<?php
include('koneksi.php');

$query = "SELECT id, jenis, latitude, longitude, jalan, desa, kecamatan, kabupaten, provinsi, luas, klasifikasi, status, deskripsi, foto, harga FROM assets";
$result = $link->query($query);

$assets = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['alamat'] = $row['jalan'] . ', ' . $row['desa'] . ', ' . $row['kecamatan'] . ', ' . $row['kabupaten'] . ', ' . $row['provinsi'];
        $assets[] = $row;
    }
}

echo json_encode($assets);
?>
