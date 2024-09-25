<?php
include('koneksi.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mencegah SQL Injection
    $username = mysqli_real_escape_string($link, $username);
    $password = mysqli_real_escape_string($link, $password);

    // Query untuk mengambil data pengguna berdasarkan username
    $query = "SELECT * FROM pengguna WHERE username = '$username'";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            // Set session untuk menyimpan status login dan role
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];

            // Redirect berdasarkan role
            if ($row['role'] == 'user') {
                header("Location: index.php");
                exit();
            } elseif ($row['role'] == 'admin') {
                header("Location: index_admin.php");
                exit();
            } else {
                echo "Role tidak dikenali!";
            }
        } else {
            // Password salah
            header("Location: login.php?pesan=gagal");
            exit();
        }
    } else {
        // Username tidak ditemukan
        header("Location: login.php?pesan=gagal");
        exit();
    }
}

// Tutup koneksi
mysqli_close($link);
?>
