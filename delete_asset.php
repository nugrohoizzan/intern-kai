<?php
header('Content-Type: application/json');
include 'koneksi.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id)) {
    $assetId = $data->id;

    // Mulai transaksi
    $link->begin_transaction();

    try {
        // Periksa apakah aset ada
        $stmt = $link->prepare("SELECT id FROM assets WHERE id = ?");
        if ($stmt === false) {
            throw new Exception("Prepare failed: " . $link->error);
        }
        $stmt->bind_param('s', $assetId); // Ubah 'i' menjadi 's' jika id adalah string
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows === 0) {
            $stmt->close();
            $link->rollback();
            echo json_encode(['success' => false, 'message' => 'ID aset tidak ditemukan']);
            exit();
        }
        $stmt->close();

        // Hapus data terkait di tabel blok
        $stmt = $link->prepare("DELETE FROM blok WHERE asset_id = ?");
        if ($stmt === false) {
            throw new Exception("Prepare failed: " . $link->error);
        }
        $stmt->bind_param('s', $assetId); // Ubah 'i' menjadi 's' jika id adalah string
        $stmt->execute();
        $blokAffectedRows = $stmt->affected_rows; // Simpan jumlah baris yang terpengaruh
        $stmt->close();

        // Hapus aset dari tabel assets
        $stmt = $link->prepare("DELETE FROM assets WHERE id = ?");
        if ($stmt === false) {
            throw new Exception("Prepare failed: " . $link->error);
        }
        $stmt->bind_param('s', $assetId); // Ubah 'i' menjadi 's' jika id adalah string
        $stmt->execute();
        $assetAffectedRows = $stmt->affected_rows; // Simpan jumlah baris yang terpengaruh
        $stmt->close();

        if ($assetAffectedRows > 0) {
            $link->commit();
            echo json_encode(['success' => true, 'message' => 'Aset berhasil dihapus.']);
        } else {
            $link->rollback();
            echo json_encode(['success' => false, 'message' => 'Tidak ada baris yang terpengaruh di tabel aset. ID mungkin salah atau sudah dihapus.']);
        }
    } catch (Exception $e) {
        // Rollback transaksi jika terjadi error
        $link->rollback();
        error_log("Error: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus aset.', 'error' => $e->getMessage()]);
    }

    $link->close();
} else {
    echo json_encode(['success' => false, 'message' => 'ID tidak disediakan']);
}
?>
