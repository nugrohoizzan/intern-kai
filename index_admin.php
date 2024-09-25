<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beranda</title>
    <link rel="icon" href="asset/KAI.png" type="image/png">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            text-align: left;
        }
        nav .menu ul li ul.dropdown li {
            width: 100%;
        }
        nav .menu ul li:hover ul.dropdown {
            display: block;
        }

        @media screen and (max-width: 1000px) {
    .layar-dalam {
        width: 90%;
    }
}

@media screen and (max-width: 768px) {
    nav {
        display: flex;
        justify-content: space-between; 
        align-items: center;
        padding: 10px;
    }

    nav .logo {
        margin-right: auto; 
    }

    nav .menu-toggle {
        display: block;
        margin-left: auto; 
    }

    nav .menu {
        display: none;
        flex-direction: column;
        width: 100%;
    }

    nav.show .menu {
        display: flex;
    }

    nav .menu ul {
        flex-direction: column;
        width: 100%;
    }

    nav .menu ul li {
        margin: 0;
        width: 100%;
    }

    nav .menu ul li ul.dropdown {
        width: 100%;
        left: 0;
    }

    nav .menu ul li a {
        padding: 10px;
        display: block;
    }

    .wrapper {
        width: 80%;
        margin: 10% auto;
        padding: 30px;
        top: auto;
        position: relative;
    }

    .input-box .input-field {
        width: 100%;
    }

    .input-box .input-field input,
    .input-box .input-field select {
        font-size: 14px;
    }

    header .intro h3 {
        font-size: 36px;
    }

    .blog .area {
        width: 100%;
        flex-direction: column;
    }

    .blog .area img {
        width: 100%;
    }

    .blog .area .text article {
        padding: 20px;
    }
}

.menu-toggle {
    display: none;
    font-size: 24px;
    cursor: pointer;
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

/* Mobile responsiveness */
@media (max-width: 768px) {
    .menu {
        display: none;
    }
    .menu-toggle {
        display: block;
    }
}

    </style>
</head>
<body>
<nav>
      <div class="layar-dalam">
        <div class="logo">
          <a href="index_admin.php"><img src="asset/KAI.png" class="biru" /></a>
          <a href="index_admin.php"><img src="asset/KAI_PUTIH.png" class="hitam" /></a>
        </div><br>
        <div class="menu-toggle" id="menu-toggle">
        &#9776;
        </div>
        <div class="menu">
          
          <ul>
            
            <li><a href="index_admin.php" class="active">Beranda</a></li>
            <li>
              <a href="#">Data Asset</a>
                  <ul class="dropdown">
                      <li><a href="tambah_asset.php">Tambah Data</a></li>
                      <li><a href="lihat_asset_admin.php">Lihat Data</a></li>
                  </ul>
            </li>
            <li>
              <a href="#">Profil</a>
                  <ul class="dropdown">
                      <li><a href="profil_admin.php">Profil Admin</a></li>
                      <li><a href="tambah_admin.php">Tambah Admin</a></li>
                      <li><a href="logout.php">Logout</a></li>
                  </ul>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="close-btn" id="close-btn">&times;</div><br>
    <ul>
        <li><a href="index_admin.php" class="active"><i class="bi bi-house-door-fill"></i>  Beranda</a></li>
        <li><a href="lihat_asset_admin.php"><i class="bi bi-eye-fill"></i>  Lihat Data</a></li>
        <li><a href="tambah_asset.php"><i class="bi bi-file-plus"></i>  Tambah Data</a></li>
        <li><a href="profil_admin.php"><i class="bi bi-person"></i>  Profil Admin</a></li>
        <li><a href="tambah_admin.php"><i class="bi bi-person-add"></i>  Tambah Admin</a></li>
        <li><a href="logout.php"><i class="bi bi-box-arrow-right"></i>  Logout</a></li>
    </ul>
</div>

    <div class="layar-penuh">
        <header id="home">
            <div class="overlay"></div>
            <video autoplay muted loop>
                <source src="asset/video1.MP4" type="video/mp4" />
            </video>
            <div class="intro">
                <h3>Mapping Assets DAOP 6 Yogyakarta</h3>
                <br>
                <p>Mempermudah dalam menampilkan data asset yang berada dalam wilayah DAOP 6 Yogyakarta.</p>
            </div>
        </header>
        <main>
            <section id="aboutus">
                <div class="layar-dalam">
                    <h3>Mapping Assets DAOP 6 Yogyakarta</h3>
                    <div class="konten-isi">
                        <p>
                            Merupakan visualisasi pencatatan asset yang dimiliki sehingga asset yang dimiliki dapat terorganisir oleh sistem. Sistem akan mengelola dan memantau aset secara efektif, memastikan penggunaan optimal, dan mengurangi risiko terkait aset tersebut.
                        </p>
                    </div>
                </div>
            </section>
            <section class="daop">
                <div class="layar-dalam">
                    <p>PT KAI DAOP 6 Yogyakarta</p>
                </div>
            </section>
            <section class="abuabu" id="blog">
                <div class="layar-dalam">
                    <h3>VISI & MISI</h3>
                    <div class="blog">
                        <div class="area">
                            <div class="text">
                                <article>
                                    <h4><a href="#">Visi </a></h4>
                                    <section class="abuabu" id="blog"><br>
                                        <p class="visi">
                                            Menjadi solusi <br>ekosistem <br>transoportasi terbaik <br>untuk Indonesia
                                        </p>
                                    </section>
                                </article>
                            </div>
                        </div>
                        <div class="area">
                            <div class="text">
                                <article>
                                    <h4><a href="#">Misi</a></h4>
                                    <section class="abuabu" id="blog">
                                        <p class="misi">
                                            Menjadi solusi ekosistem transoportasi terbaik untuk Indonesia Untuk menyediakan sistem transportasi yang aman, efisien berbasis digital, dan berkembang pesat untuk memenuhi kebutuhan pelanggan.
                                        </p>
                                        <br>
                                        <p class="misi">
                                            Untuk mengembangkan solusi transportasi masal yang terintergrasi melalui investasi dalam sumber daya manusia, infrastruktur, dan teknologi.
                                        </p>
                                        <br>
                                        <p class="misi">
                                            Untuk memajukan pembangunan nasional melalui kemitraan para pemangku kepentingan, termasuk memprakarsai dan melaksanakan pengembangan infrastruktur-infrastruktur penting terkait transportasi.
                                        </p>
                                    </section>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
        document.addEventListener("DOMContentLoaded", function() {
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const closeBtn = document.getElementById('close-btn');

    menuToggle.addEventListener('click', function() {
        sidebar.classList.add('show');
    });

    closeBtn.addEventListener('click', function() {
        sidebar.classList.remove('show');
    });
});

    </script>
</body>
</html>
