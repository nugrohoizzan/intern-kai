<?php
include('koneksi.php');

$input = json_decode(file_get_contents('php://input'), true);
$assetId = isset($input['id']) ? $input['id'] : '';

if (!empty($assetId)) {
    $stmt = $link->prepare("SELECT id_blok, nama_blok, deskripsi FROM blok WHERE asset_id = ?");
    $stmt->bind_param("s", $assetId);  // Menggunakan 's' untuk string
    $stmt->execute();
    $result = $stmt->get_result();

    $blokDetails = [];
    while ($row = $result->fetch_assoc()) {
        $blokDetails[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($blokDetails);
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Invalid asset ID', 'received_id' => $assetId]);
}

$link->close();
?>
