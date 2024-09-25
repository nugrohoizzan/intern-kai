<?php
session_start();
if(empty($_SESSION['username'])) {
    header("location:login.php?pesan=belum_login");
    exit;
}

include 'koneksi.php';

$id_pengguna = $_POST['id_pengguna'];
$username = $_POST['username'];
$email = $_POST['email'];
$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$foto = $_FILES['foto']['name'];
$tmp_name = $_FILES['foto']['tmp_name'];

move_uploaded_file($tmp_name, 'uploads/'.$foto);

$query = mysqli_query($link, "UPDATE pengguna SET username='$username', nama='$nama', kelamin='$kelamin', foto='$foto' WHERE id_pengguna='$id_pengguna'")
    or die(mysqli_error($link));

if($query) {
    echo '<script>alert("Proses edit berhasil!"); window.location.href = "profil_admin.php";</script>';
} else {
    echo "Edit data gagal";
}
?>
