<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php?pesan=belum_login");
    exit;
}

include('koneksi.php');

$username = $_SESSION['username'];
$query = "SELECT * FROM pengguna WHERE username = '$username'";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result); 
} else {
    echo "User not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Pengguna</title>
    <link rel="icon" href="asset/KAI.png" type="image/png">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
            text-align: left;
        }
        nav .menu ul li ul.dropdown li {
            width: 100%;
        }
        nav .menu ul li:hover ul.dropdown {
            display: block;
        }
        table {
            border-collapse: collapse;
            width: 100%; 
            margin: auto; 
        }
        th, td {
            padding: 15px;
            font-size: 20px;
            text-align: left; 
            padding: 20px;
        }
        th {
            background-color: #f5f5f5;
            text-align: center; 
        }
        tr:hover {
            background-color: #ED6B23;
        }
        
        .active{
            background-color: #ED6B23;
        }
        .blog {
            display: flex;
            flex-direction: column; 
            align-items: center; 
        }
        .blog .area {
            width: 90%; 
            box-shadow: 0px -10px 30px #ccc;
            border-radius: 10px;
            padding: 50px; 
            margin-bottom: 20px; 
        }
        .blog .area .text {
            padding: 12px;
            text-align: center;
        }
        .blog .area .text article table {
            margin: auto;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
    
        .button-container .tambah {
            display: inline-block;
            background-color: #252271;
            color: #fff;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
    
        .button-container .tambah:hover {
            background-color: #ED6B23;
        }
    
        .blog .area .text img {
            border-radius: 50%; 
            width: 30%; 
            height: auto; 
        }
    
        /* Menu Toggle */
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
    
        /* Responsive Styles */
    @media (max-width: 767px) {
        
    
        .blog .area {
            width: 100%;
            padding: 20px;
            margin: 10px 0;
        }
    
        .blog .area .text table {
            font-size: 16px;
        }
    
        .blog .area .text img {
            width: 50%; 
            height: auto; 
        }
    
        th, td {
            font-size: 16px;
            padding: 10px;
        }
    
        .button-container .tambah {
            font-size: 14px;
            padding: 10px 20px;
        }
        nav .menu {
            display: none;
        }
    
        . .menu {
            display: none;
        }
    
        .menu-toggle {
            display: block;
        }
    }
        </style>

    <nav>
        <div class="layar-dalam">
            <div class="logo">
                <a href="index_admin.php"><img src="asset/KAI.png" class="biru" /></a>
                <a href="index_admin.php"><img src="asset/KAI_PUTIH.png" class="hitam" /></a>
            </div><br>
            <div class="menu-toggle" onclick="toggleSidebar()">
            &#9776;
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
    <div id="mySidebar" class="sidebar"><br>
    <span class="close-btn" onclick="closeSidebar()">&times;</span>
    <ul>
        <li><a href="index_admin.php"><i class="bi bi-house-door-fill"></i>  Beranda</a></li>
        <li><a href="lihat_asset_admin.php"><i class="bi bi-eye-fill"></i>  Lihat Data</a></li>
        <li><a href="tambah_asset.php"><i class="bi bi-file-plus"></i>  Tambah Data</a></li>
        <li><a href="profil_admin.php" class="active"><i class="bi bi-person"></i>  Profil Admin</a></li>
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
                <h3>Detail Profil Pengguna</h3>
                <br>
                <p>Profil lengkap anda berada dibawah ini</p>
            </div>
        </header>

        <main>
            <section class="abuabu" id="blog">
                <div class="layar-dalam">
                    <h3>PROFIL ADMIN</h3>
                    <div class="blog">
                        <div class="area">
                            <div class="text">
                                <article>
                                    <table width="100%" border="0">
                                        <thead>
                                            <tr>
                                                <th colspan="2"><center><img src="uploads/<?php echo $user['foto']; ?>" alt="Foto Profil" width="190" height="220" style="border-radius: 70%; width: 30%;"></center></th>
                                            </tr>
                                        </thead>
                                        <br>
                                        <tbody>
                                            <tr>
                                                <th style="text-align: left;">NIPP</th>
                                                <td><?php echo $user['id_pengguna']; ?></td>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left;">Username</th>
                                                <td><?php echo $user['username']; ?></td>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left;">Email</th>
                                                <td><?php echo $user['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left;">Nama</th>
                                                <td><?php echo $user['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left;">Unit</th>
                                                <td><?php echo $user['kelamin']; ?></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <th style="text-align: left;">Role</th>
                                                <td><?php echo $user['role']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                </article>
                                <center>
                                <div class="button-container">
                                        <button class="tambah">
                                            <a href="edit_profil_admin.php?id_pengguna=<?php echo $user['id_pengguna'];?>" style="color: white; text-decoration: none;"> Edit profil </a>
                                        </button>
                                </div>
                                </center>
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
    function toggleSidebar() {
        var sidebar = document.getElementById("mySidebar");
        sidebar.classList.toggle('show');
    }

    function closeSidebar() {
        document.getElementById("mySidebar").classList.remove('show');
    }
</script>
</body>
</html>

<?php
// Tutup koneksi
mysqli_close($link);
?>
