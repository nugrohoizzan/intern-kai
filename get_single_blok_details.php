<?php
header('Content-Type: application/json');

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_asset";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari POST
$data = json_decode(file_get_contents('php://input'), true);

// Periksa apakah data POST diterima
if (is_null($data)) {
    echo json_encode(["error" => "Data POST tidak diterima"]);
    exit;
}

// Periksa apakah id_blok ada di dalam data POST
if (!isset($data['id_blok'])) {
    echo json_encode(["error" => "id_blok tidak ada dalam data POST"]);
    exit;
}

$id_blok = $data['id_blok'];

// Query untuk mengambil detail blok
$sql = "SELECT id_blok, asset_id, nama_blok, alias, area, dimension, deskripsi, best_use, foto FROM blok WHERE id_blok = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_blok);
$stmt->execute();
$result = $stmt->get_result();

// Periksa hasil query
if ($result->num_rows > 0) {
    $blok = $result->fetch_assoc();
    echo json_encode($blok);
} else {
    echo json_encode([]);
}

$stmt->close();
$conn->close();
?>
