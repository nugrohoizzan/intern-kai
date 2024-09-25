<?php
session_start();
if(empty($_SESSION['username']))
{
header("location:login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Tambah Admin</title>
    <link rel="icon" href="asset/KAI.png" type="image/png">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<style>
 h5 {
    color: rgb(255, 255, 255);
    font-size: 20px;
    margin-bottom: 15px;
    text-align: center;
    font-weight: bold;
  }
  nav .menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
  }
  nav .menu ul li {
    position: relative;
    margin-right: 20px;
  }
  nav .menu ul li ul.dropdown {
    display: none;
    position: absolute;
    top: 60px;
    left: 0; 
    background-color: #252271; 
    z-index: 1000;
    width: 200px; 
    text-align:  left;
  }
  nav .menu ul li ul.dropdown li {
    width: 100%;
  }
  nav .menu ul li:hover ul.dropdown {
    display: block;
  }
  main {
  position: relative;
  height: 100vh;
  width: 100%;
  overflow: hidden;
  z-index: 2;
}
main video {
  position: absolute;
  top: 0;
  left: 0;
  object-fit: cover;
  z-index: -2;
}
main .intro {
  z-index: 100;
  color: #fff;
  text-align: center;
  position: relative;
  top: 50%;
}
main .intro h3 {
  font-size: 50px;
  margin: 0;
  padding: 0;
}

main .overlay {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: #000;
  opacity: 50%;
  z-index: -1;
}
.wrapper {
    width: 100%;
    max-width: 900px;
    background: rgba(255, 255, 255, .1);
    border: 2px solid rgba(255, 255, 255, .2);
    box-shadow: 0 0 10px rgba(0, 0, 0, .2);
    backdrop-filter: blur(50px);
    border-radius: 10px;
    color: #2D2A70;
    padding: 40px 35px 55px;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 20px auto;
}

.wrapper h3 {
    font-size: 36px;
    text-align: center;
    margin-bottom: 20px;
}

/* Form Layout */
.wrapper .input-box {
    display: flex;
    flex-wrap: wrap;
    gap: 10px; 
}

.input-box .input-field {
    flex: 1 1 calc(50% - 10px); 
    min-width: 220px; 
    margin: 10px 0;
    position: relative;
    box-sizing: border-box; 
    
}

.input-box .input-field input,
.input-box .input-field select,
.input-box .input-field textarea {
    width: 100%;
    height: 50px;
    background: transparent;
    border: 2px solid #2D2A70; 
    outline: none;
    font-size: 16px;
    color: #2D2A70; 
    border-radius: 6px;
    padding: 15px 15px 15px 40px;
    box-sizing: border-box; 
    overflow-y: hidden;
    overflow-x: hidden;
}

.wrapper .input-field input::placeholder,
.input-field select::placeholder,
.input-field textarea::placeholder {
    color: #2D2A70; 
    opacity: 1;
}


.input-field textarea {
    height: auto; 
    padding: 15px;
}

.input-field input::placeholder,
.input-field select::placeholder,
.input-field textarea::placeholder {
    color: #2D2A70; 
    opacity: 1; 
    font-weight: normal; 
}

.input-field1 {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.input-field1 input[type="file"] {
    border: 2px solid #2D2A70; 
    border-radius: 6px;
    padding: 10px;
    background: #fff; 
    color: #2D2A70; 
}

.input-field1 i {
    font-size: 20px;
    color: #2D2A70;
    margin-bottom: 5px;
}

.wrapper p {
    display: inline-block;
    font-size: 14.5px;
    margin: 10px 0 23px;
}

.wrapper a {
    margin-right: 5px;
    color: #F5F6F6;
}

.button-container {
    text-align: center;
    margin-top: 20px;
}

.button-container .tambah {
    display: inline-block;
    background-color: #2D2A70;
    color: #F5F6F6; 
    border: 2px solid #2D2A70; 
    padding: 12px 24px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 6px;
    text-decoration: none;
    transition: background-color 0.3s ease, color 0.3s ease;
    text-align: center;
}

.button-container .tambah:hover {
    background-color: #ED6B23;
    color: #fff; 
    border-color: #ED6B23; 
}

/* CSS untuk menu toggle */
.menu-toggle {
    display: none; 
    font-size: 24px;
    cursor: pointer;
    color: #fff;
    margin: 10px;
}

/* Sidebar styles */
.sidebar {
    position: fixed;
    top: 0;
    right: 0;
    width: 250px;
    height: 100%;
    background: #252271;
    color: #fff;
    transform: translateX(100%);
    transition: transform 0.3s ease;
    z-index: 2000;
    padding: 20px;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    margin: 20px 0;
}

.sidebar ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
}

/* Close button styles */
.close-btn {
    font-size: 30px;
    cursor: pointer;
    position: absolute;
    top: 20px;
    left: 20px;
}

/* Show sidebar */
.sidebar.show {
    transform: translateX(0);
}

/* Mobile Responsiveness */
@media (max-width: 768px) {

    
    .wrapper {
        padding: 20px;
        margin: 10px;
    }

    .input-box {
        flex-direction: column;
        gap: 10px; 
    }

    .input-field {
        width: 110%; 
    }
    .input-box .input-field {
        width: 100%; 
        flex: none;
    }

    .input-field input,
    .input-field select,
    .input-field textarea {
        height: auto; 
        padding: 10px;
    }

    .button-container .tambah {
        width: 100%; 
        padding: 12px 0; 
    }

    .menu {
        display: none;
    }

    .menu-toggle {
        display: block; 
    }
}

.back-container {
    position: absolute;
    top: 20px;
    left: 20px;
}

.back-link {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #2D2A70;
    font-size: 20px; 
    font-weight: bold;
}

.back-link i {
    margin-right: 5px; 
    font-size: 24px; 
}

.back-link:hover {
    color: #2D2A70; 
}

</style>
    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            if (!email.endsWith("@gmail.com")) {
                alert("Email harus berisi @gmail.com");
                return false;
            }

            if (password.length < 8) {
                alert("Kata sandi harus memiliki minimal 8 karakter");
                return false;
            }

            return true;
        }
    </script>

<body>
<nav>
    <div class="layar-dalam">
        <div class="logo">
            <a href="index.php"><img src="asset/KAI.png" class="biru" /></a>
            <a href="index.php"><img src="asset/KAI_PUTIH.png" class="hitam" /></a>
        </div>
        <div class="menu-toggle">
                &#9776; <!-- Hamburger icon -->
            </div>
        <div class="menu">
                <ul>
                    <li><a href="index_admin.php">Beranda</a></li>
                    <li>
                        <a href="#">Data Asset</a>
                        <ul class="dropdown">
                            <li><a href="tambah_asset.php">Tambah Data</a></li>
                            <li><a href="lihat_asset_admin.php">Lihat Data</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="active">Profil</a>
                        <ul class="dropdown">
                            <li><a href="profil_admin.php">Profil</a></li>
                            <li><a href="tambah_admin.php">Tambah Admin</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
        </div>
    </div>
</nav>
<div id="mySidebar" class="sidebar">
        <span class="close-btn">&times;</span><br>
        <ul>
          <li><a href="index_admin.php"><i class="bi bi-house-door-fill"></i>  Beranda</a></li>
          <li><a href="lihat_asset_admin.php"><i class="bi bi-eye-fill"></i>  Lihat Data</a></li>
          <li><a href="tambah_asset.php"><i class="bi bi-file-plus"></i>  Tambah Data</a></li>
          <li><a href="profil_admin.php"><i class="bi bi-person"></i>  Profil Admin</a></li>
          <li><a href="tambah_admin.php" class="active"><i class="bi bi-person-add"></i>  Tambah Admin</a></li>
          <li><a href="logout.php"><i class="bi bi-box-arrow-right"></i>  Logout</a></li>
        </ul>
    </div>
<div class="layar-penuh">
      <header id="home">
        <div class="overlay"></div>
        <video autoplay muted loopv>
            <source src="asset/video1.MP4" type="video/mp4" />
        </video>
        <div class="intro">
          <h3>Tambah Admin</h3>
          <br>
          <p>Silahkan jika ingin menambahkan sesama admin.</p>
        </div>
      </header>
      <main>
        <section id="aboutus">
<div class="layar-dalam">
    <center>
    <div class="wrapper" style="top: 0px;">
        <form role="form" action="insert_register_admin.php" method="post" class="form-tambah" enctype="multipart/form-data">
            <h3>Tambah Admin</h3>
            <div class="input-box">
                <div class="input-field">
                    <input type="text" name="id_pengguna" placeholder="NIPP" required>
                    <i class='bx bxs-user-circle'></i>
                </div>
                <div class="input-field">
                    <input type="text" name="username" placeholder="Username" required style="color: white;">
                    <i class='bx bxs-user'></i>
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-field">
                    <input type="password" name="password" placeholder="Kata Sandi" required>
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
                    <select name="kelamin" placeholder="Unit" required>
                        <option>Sistem Informasi</option>
                        <option>Penjagaan Asset</option>
                        <option>KNA</option>
                    </select>
                </div>
            </div>
            <div class="input-box1">
                <div class="input-field1">
                <i class='bx bxs-photo-album' >Foto Profil</i>
                    <input type="file" name="foto" placeholder="Foto Profil" required>
                    
                </div>
            </div>
            <br>
            <button class="register" type="submit" name="submit" value="REGISTER">Daftar</button>
            
        </form>
        </center></div>
    </main>
 
    <footer>
        <div class="container">
            <div class="footer-content">
                <h5>Kontak Kami</h5>
                <p>Email : humasda6@kai.id</p>
                <p>Alamat : Jl. Lempuyangan No. 1 Yogyakarta</p>
            </div>
            <div class="footer-content">
                <h5>Jam Layanan</h5>
                <p>Senin - Kamis 08.00 - 17.00 WIB</p>
                <p>Jumat 08.00 - 16.30 WIB</p>
            </div>
            <div class="footer-content">
                <h5>Ikuti Kami</h5>
                <ul class="social-icons">
                    <li><a href="https://www.facebook.com/keretaapikita"><i class="bi bi-facebook"></i></a></li>
                    <li><a href="https://x.com/keretaapikita"><i class="bi bi-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/keretaapikita"><i class="bi bi-instagram"></i></a></li>
                    <li><a href="https://www.youtube.com/keretaapikita"><i class="bi bi-youtube"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="bottom-bar">
            <p>PT KAI DAOP 6 Yogyakarta &copy; 2024 . All Rights Reserved</p>
        </div>
    </footer>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="script.js"></script>
<script>

// Function untuk menampilkan toggle sidebar 
function toggleSidebar() {
    var sidebar = document.getElementById("mySidebar");
    sidebar.classList.toggle('show'); r
}

// Function untuk menutup sidebar
function closeSidebar() {
    document.getElementById("mySidebar").classList.remove('show'); 
}

// event listener untuk menu toggle button
document.querySelector('.menu-toggle').addEventListener('click', toggleSidebar);

//  event listener untuk menutup button di dalam  sidebar
document.querySelector('.close-btn').addEventListener('click', closeSidebar);

</script>
</body>
</html>