<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Formulir Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="asset/KAI.png" type="image/png">
    <style>
        body {
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('asset/daop6.jpeg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            position: fixed;
            top: 0;
            width: 100%;
            height: 60px;
            background-color: #252271;
            z-index: 10;
        }

        footer {
            background-color: #252271;
            text-align: center;
            font-size: 18px;
            color: #F5F6F6;
            padding: 10px 0;
            width: 100%;
            position: fixed;
            bottom: 0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .wrapper {
            width: 100%;
            max-width: 700px; /* Ukuran form lebih besar */
            background: rgba(255, 255, 255, .1);
            border: 2px solid rgba(255, 255, 255, .2);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            backdrop-filter: blur(50px);
            border-radius: 10px;
            color: #ffffff;
            padding: 40px;
            box-sizing: border-box; /* To include padding in the width */
            margin: 20px;
            margin-top: -30px;
        }

        h3 {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 20px;
        }

        .input-box .input-field {
            width: 48%;
            margin: 10px 1%;
            display: inline-block;
            position: relative;
        }

        .input-field input {
            width: 100%;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.2);
            outline: none;
            font-size: 1.1rem;
            color: #fff;
            border-radius: 6px;
            padding: 12px 40px 12px 15px;
        }

        .input-field i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #fff;
        }

        .input-field select {
            width: 100%;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.2);
            outline: none;
            font-size: 1.1rem;
            color: #fff;
            border-radius: 6px;
            padding: 12px 15px;
        }

        .register {
            width: 100%;
            height: 45px;
            background-color: #f5f6f6;
            border: none;
            outline: none;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 1.25rem;
            color: #333;
            font-weight: 600;
            margin-top: 20px;
        }

        .pesan {
            margin-top: 20px;
            color: #fff;
            text-align: center;
        }

        @media (max-width: 768px) {
            .wrapper {
                width: 90%;
                padding: 20px;
                margin: 20px auto;
            }

            .input-box .input-field {
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <center>
                <div class="logoo">
                    <a href="index.php"><img src="asset/KAI_PUTIH.png" alt="Logo"/></a>
                </div>
            </center>
        </nav>
    </header>

<?php
include('koneksi.php');

function getNextUserId($prefix, $link) {
    $query = "SELECT MAX(id_pengguna) as max_code FROM pengguna WHERE id_pengguna LIKE '$prefix%'";
    $result = mysqli_query($link, $query);
    $data = mysqli_fetch_array($result);

    if ($data['max_code']) {
        $code = $data['max_code'];
        $urutan = (int)substr($code, 2, 3);
        $urutan++;
    } else {
        $urutan = 1; 
    }

    return $prefix . sprintf("%03s", $urutan);
}

$prefix = "US"; 
$id_user = getNextUserId($prefix, $link);
?>

    <div class="container">
        <div class="wrapper">
            <form role="form" action="insert_register.php" method="post" class="form-tambah" enctype="multipart/form-data">
                <h3>Register</h3>
                <div class="input-box">
                    <div class="input-field">
                        <input type="text" name="id_pengguna" value="<?php echo $id_user; ?>" placeholder="Id Pengguna" readonly>
                        <i class='bx bxs-user-circle'></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="username" placeholder="Username" required>
                        <i class='bx bxs-user'></i>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-field">
                        <input type="email" name="email" placeholder="Email" required id="email">
                        <i class='bx bxs-envelope'></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" placeholder="Kata Sandi" required id="password">
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-field">
                        <input type="text" name="nama" placeholder="Nama" required>
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-field">
                        <i class='bx bx-male-female'></i>
                        <select name="kelamin" placeholder="Jenis Kelamin" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="input-box1">
                    <div class="input-field1">
                    <i class='bx bxs-photo-album'>Foto Profil</i>
                        <input type="file" name="foto" placeholder="Foto Profil" required>
                        
                    </div>
                </div>
                <button class="register" type="submit" name="submit" value="REGISTER">Daftar</button>
                <center>
                    <p>Sudah Punya Akun?</p>
                    <a href="login.php" style="color: #F5F6F6; font-weight: bold">Masuk</a>
                </center>
            </form>
        </div>
    </div>
    
    <footer>
        <p>PT KAI DAOP 6 Yogyakarta &copy; 2024 . All Rights Reserved</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>