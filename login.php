<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
            flex-direction: column; /* Allows footer to stick to bottom */
            min-height: 100vh; /* Ensure body covers full viewport height */
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
            max-width: 700px; /* Increase the max width for larger screens */
            background: rgba(255, 255, 255, .1);
            border: 2px solid rgba(255, 255, 255, .2);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            backdrop-filter: blur(50px);
            border-radius: 10px;
            color: #ffffff;
            padding: 40px;
            margin: 0;
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
                margin: 0 auto;
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
            <div class="logoo">
                <a href="index.html"><img src="asset/KAI_PUTIH.png" class="img-fluid" alt="Logo"></a>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="wrapper">
            <form role="form" action="cek_login.php" method="post" class="form-tambah">
                <h3>Login</h3>
                <div class="input-box">
                    <div class="input-field">
                        <input type="text" name="username" placeholder="Username" required>
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                </div>
                <button class="register" type="submit" name="submit" value="LOGIN">LOGIN</button>
                <center>
                    <p>Belum Punya Akun?</p>
                    <a href="register.php">Register</a>
                </center>
            </form>

            <center>
                <div class="pesan">
                    <?php
                    if(isset($_GET['pesan'])) {
                        if($_GET['pesan'] == "gagal") {
                            echo "Login gagal! <br>Username dan password salah!";
                        } elseif ($_GET['pesan'] == "logout") {
                            echo "Anda telah berhasil logout";
                        } elseif ($_GET['pesan'] == "belum_login") {
                            echo "Anda harus login untuk mengakses halaman utama!";
                        }
                    }
                    ?>
                </div>
            </center>
        </div>
    </div>
    
    <footer>
        <p>PT KAI DAOP 6 Yogyakarta &copy; 2024. All Rights Reserved</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
