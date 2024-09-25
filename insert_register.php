<?php
include('koneksi.php');

if (isset($_POST['submit'])) {
    
    $id_pengguna = $_POST['id_pengguna'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $nama = $_POST['nama'];
    $kelamin = $_POST['kelamin'];
    $role = 'user'; 

    // Handle upload file
    $foto = $_FILES['foto']['name'];
    $temp = $_FILES['foto']['tmp_name'];
    $folder = "uploads/";

    // Pindahkan foto ke folder tujuan
    if (move_uploaded_file($temp, $folder . $foto)) {
        $query = "INSERT INTO pengguna (id_pengguna, username, email, password, nama, kelamin, foto, role) 
                  VALUES ('$id_pengguna', '$username', '$email', '$password', '$nama', '$kelamin', '$foto', '$role')";

        if (mysqli_query($link, $query)) {
            echo "Registrasi berhasil!";
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($link);
        }
    } else {
        echo "Gagal mengunggah foto.";
    }
}

mysqli_close($link);
?>
