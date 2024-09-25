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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Data Asset</title>
    <link rel="icon" href="asset/KAI.png" type="image/png">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css" />
    <style>
#blok-detail-container {
    display: flex;
    flex-direction: column;
    height: 100%;
    padding: 0 10px; 
    box-sizing: border-box; 
}
        
        /* Responsive untuk layar kecil (mobile) */
        @media (max-width: 768px) {
            nav ul {
                display: flex;
                flex-direction: column;
                text-align: center;
            }
            nav ul li {
                margin: 10px 0;
            }
            .search-container {
                width: 90%;
                margin: 20px auto;
            }
            .main-container {
                flex-direction: column;
            }
            .map-container {
                height: 400px; 
            }
            #blok-details, #blok-detail-container, #asset-details {
                width: 100%;
                left: 0;
            }
            #blok-details table, #blok-detail-container table, .details-table {
                font-size: 14px; 
            }
            .details-table th, .details-table td {
                padding: 6px;
            }
            .icon-button1, .back-button {
                padding: 10px;
                font-size: 16px;
            }
            footer {
                font-size: 14px; 
            }
            footer .container {
                flex-direction: column;
                align-items: center;
                padding: 10px;
            }
            footer .footer-content {
                margin-bottom: 20px;
                text-align: center;
            }
    #blok-detail-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        max-width: 100%;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        overflow-y: auto;
        background-color: rgba(255, 255, 255, 0.9);
        height: auto; 
        box-sizing: border-box; 
    }
    
    .button-container {
        display: flex;
        flex-direction: column;
        gap: 10px; 
        padding-bottom: 20px; 
        margin-top: 20px; 
    }

    .button-container button {
        width: 100%;
        padding: 10px; 
        box-sizing: border-box; 
    }
        }

        @media (min-width: 769px) {
            #blok-detail-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 64%;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        overflow-y: auto;
        height: auto; 
        max-height: calc(100vh - 60px); 
        box-sizing: border-box; 
    }
    
    .button-container {
        display: flex;
        justify-content: space-between;
        margin-top: 20px; 
    }
    
    .button-container button {
        width: auto;
        padding: 10px;
        box-sizing: border-box;
    }
}

        /* Custom Styles */
        #detail-foto {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .asset-image {
            width: 100%;
            height: auto;
            aspect-ratio: 16 / 9;
            object-fit: cover;
            border-radius: 10px;
        }
        .icon-button1 {
            float: left;
            margin: 5px;
            padding: 7px;
            background-color: #ED6B23;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        .icon-button1:hover {
            background-color: #252271;
        }
        .back-button {
            float: right;
            padding: 7px;
            background-color: #252271;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        .icon-button {
            float: left;
            background: none;
            border: none;
            cursor: pointer;
            color: #ED6B23;
            font-size: 36px;
            margin-right: 10px;
            transition: color 0.3s;
            padding: 0px;
        }
        .back-button:hover {
            background-color: #ED6B23;
        }
        .search-container {
            width: 100%;
            max-width: 600px;
            background: white;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            border-radius: 5px;
            margin: 40px auto;
            position: relative;
            z-index: 10;
        }
        .search-container input {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .main-container {
            position: relative;
        }
        .map-container {
            margin: 0px;
            width: 100%;
            height: calc(100vh - 60px);
            transition: height 0.3s ease;
        }
        #map {
            height: 100vh;
            width: 100%;
        }
        #blok-details, #blok-detail-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 64%;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            overflow-y: auto;
            display: none;
            z-index: 10;
        }
        #blok-details .header, #blok-detail-container .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        #blok-details h3, #blok-detail-container h3 {
            margin: 0;
            margin-left: 10px;
            font-size: 24px;
        }
        h4 {
            font-size: 24px;
        }
        #blok-details table, #blok-detail-container table {
            width: 100%;
            border-collapse: collapse;
        }
        #blok-details table, #blok-details th, #blok-details td, 
        #blok-detail-container table, #blok-detail-container th, #blok-detail-container td {
            border: 1px solid #ddd;
        }
        #blok-details th, #blok-details td, 
        #blok-detail-container th, #blok-detail-container td {
            padding: 8px;
            text-align: left;
        }
        .details-table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        .details-table th, .details-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .details-table th {
            background-color: #f2f2f2;
        }
        .custom-button {
            background-color: #ED6B23;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .custom-button:hover {
            background-color: #252271;
            transform: scale(1.05);
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
            
            <li><a href="index_admin.php">Beranda</a></li>
            <li>
              <a href="#"class="active">Data Asset</a>
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
        <li><a href="index_admin.php"><i class="bi bi-house-door-fill"></i>  Beranda</a></li>
        <li><a href="lihat_asset_admin.php" class="active"><i class="bi bi-eye-fill"></i>  Lihat Data</a></li>
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
</div>

<div class="search-container">
    <input type="text" id="search-input" placeholder="Cari asset" />
</div>
    <main>
        <div class="main-container">
        
            <div class="map-container">
                <div id="map"></div>
            </div>
            <div class="details-container" id="asset-details">
                <h4>Asset Details</h4>
                <br>
                <div id="asset-foto"></div>
                <p class="price-label"><strong>Harga:</strong> <span id="asset-harga"></span></p>
                <table class="details-table">
                    <tr>
                        <th>ID</th>
                        <td id="asset-id" class="clickable"></td>
                    </tr>
                    <tr>
                        <th>Jenis</th>
                        <td id="asset-jenis"></td>
                    </tr>
                    <tr>
                        <th>Luas</th>
                        <td id="asset-luas"></td>
                    </tr>
                    <tr>
                        <th>Latitude</th>
                        <td id="asset-latitude"></td>
                    </tr>
                    <tr>
                        <th>Longitude</th>
                        <td id="asset-longitude"></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td id="asset-alamat"></td>
                    </tr>
                    <tr>
                        <th>Klasifikasi</th>
                        <td id="asset-klasifikasi"></td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td id="asset-deskripsi"></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td id="asset-status"></td>
                    </tr>
                </table>

                <button id="back-button" class="icon-button1" title="Back"><i class="bi bi-arrow-left"></i></button>
                <button id="edit-button" class="icon-button1" title="Edit"><i class="bi bi-pencil"></i></button>
                <button id="delete-button" class="icon-button1" title="Delete"><i class="bi bi-trash"></i></button>
                <button id="google-maps-button" class="back-button">Lihat di Google Maps</button>
            </div>
            <div id="blok-details">
                <button id="back-to-map-button" class="icon-button" title="Back to Map"><i class="bi bi-arrow-left"></i></button>
                <h3>Blok Details</h3>
                <table class="details-table" id="blok-table">
                    <thead>
                        <tr>
                            <th>ID Blok</th>
                            <th>Nama Blok</th>
                            <th>Deskripsi Blok</th>
                            <th>Detail</th> <!-- Tambahkan kolom Detail -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows will be inserted here -->
                    </tbody>
                </table>
                <button class="back-button" style="float: left;" id="add-blok-button"><i class='bi bi-plus' data-asset-id="">Tambah Blok</i></button>
            </div>
            <div id="blok-detail-container">
                <h4>Detail Blok</h4><br>
                <div id="detail-foto" style="text-align: center;"></div>
                <table class="details-table">
                    <tr>
                        <th>ID Blok</th>
                        <td id="detail-id-blok"></td>
                    </tr>
                    <tr>
                        <th>Asset ID</th>
                        <td id="detail-asset-id"></td>
                    </tr>
                    <tr>
                        <th>Nama Blok</th>
                        <td id="detail-nama-blok"></td>
                    </tr>
                    <tr>
                        <th>Alias</th>
                        <td id="detail-alias"></td>
                    </tr>
                    <tr>
                        <th>Area</th>
                        <td id="detail-area"></td>
                    </tr>
                    <tr>
                        <th>Dimension</th>
                        <td id="detail-dimension"></td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td id="detail-deskripsi"></td>
                    </tr>
                    <tr>
                        <th>Best Use</th>
                        <td id="detail-best-use"></td>
                    </tr>
                </table>
                <div class="button-container">
                    <button id="back-button1" class="back-button">Kembali ke Maps</button>
                    <button id="back-to-blok-list-button" class="back-button">Kembali ke Daftar Blok</button>
                </div>
            </div>
        </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"></script>
    <script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster-src.js"></script>
    <script src="script.js"></script>

    <script>
  document.addEventListener('DOMContentLoaded', () => {
    const map = L.map('map').setView([-7.7853587, 110.3660946], 12);
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const closeBtn = document.getElementById('close-btn');

    // Define marker icons for different statuses
    const statusIcons = {
        tersewa: L.icon({
            iconUrl: 'icons/tersewa.png', 
            iconSize: [32, 32], 
            iconAnchor: [16, 32], 
            popupAnchor: [0, -32] 
        }),
        belum_tersewa: L.icon({
            iconUrl: 'icons/belum_tersewa.png', 
            iconSize: [32, 32], 
            iconAnchor: [16, 32], 
            popupAnchor: [0, -32] 
        }),
        milik_perusahaan: L.icon({
            iconUrl: 'icons/milik_perusahaan.png', 
            iconSize: [32, 32], 
            iconAnchor: [16, 32], 
            popupAnchor: [0, -32] 
        })
    };

    // Create a marker cluster group
    const markersLayer = L.markerClusterGroup({
        showCoverageOnHover: false,
        zoomToBoundsOnClick: true,
        spiderfyOnMaxZoom: true,
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    let markers = [];
    let activeMarker = null;

    // Fetch assets and create markers
    fetch('get_assets.php')
        .then(response => response.json())
        .then(data => {
            markersLayer.clearLayers(); // Clear markers layer before adding new markers
            data.forEach(asset => {
                // Log the asset status to check what is being received
                console.log(`Asset ID: ${asset.id}, Status: ${asset.status}`);

                // Ensure the status value is trimmed, lowercase and spaces replaced with underscores
                const statusKey = asset.status.trim().toLowerCase().replace(/ /g, '_');
                const icon = statusIcons[statusKey] || statusIcons.belum_tersewa; // Default icon if status is not recognized

                // Log the icon being used
                console.log(`Icon URL: ${icon.options.iconUrl}`);

                const marker = L.marker([asset.latitude, asset.longitude], { icon: icon });
                marker.assetData = asset;
                markers.push(marker);

                marker.on('click', function () {
                    if (activeMarker === marker) return;

                    activeMarker = marker;
                    map.setView(marker.getLatLng(), 12);

                    // Hide all markers
                    markersLayer.clearLayers();

                    // Show only the clicked marker
                    markersLayer.addLayer(marker);

                    // Update asset details
                    document.getElementById('asset-id').textContent = asset.id;
                    document.getElementById('asset-jenis').textContent = asset.jenis;
                    document.getElementById('asset-luas').textContent = asset.luas + ' m²';
                    document.getElementById('asset-latitude').textContent = asset.latitude;
                    document.getElementById('asset-longitude').textContent = asset.longitude;
                    document.getElementById('asset-alamat').textContent = asset.alamat;
                    document.getElementById('asset-klasifikasi').textContent = asset.klasifikasi;
                    document.getElementById('asset-deskripsi').textContent = asset.deskripsi;
                    document.getElementById('asset-status').textContent = asset.status;

                    const img = document.createElement('img');
                    img.src = 'uploads/' + asset.foto;
                    img.alt = asset.jenis;
                    img.className = 'asset-image';
                    img.style.width = '100%';
                    img.style.borderRadius = '10px';
                    document.getElementById('asset-foto').innerHTML = '';
                    document.getElementById('asset-foto').appendChild(img);

                    document.getElementById('asset-harga').textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(Number(asset.harga));

                    // Show details and resize map
                    document.getElementById('asset-details').style.display = 'block';
                    document.querySelector('.map-container').style.height = 'calc(100vh)';
                    map.invalidateSize();

                    // Fetch block details
                    fetchBlokDetails(asset.id);
                });

                markersLayer.addLayer(marker);
            });

            map.addLayer(markersLayer);
        })
        .catch(error => {
            console.error('Error fetching assets:', error);
        });

    function fetchBlokDetails(assetId) {
        fetch('get_blok_details.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: assetId })
        })
        .then(response => response.json())
        .then(data => {
            const blokTableBody = document.getElementById('blok-table').querySelector('tbody');
            blokTableBody.innerHTML = '';

            if (data.length === 0) {
                blokTableBody.innerHTML = '<tr><td colspan="4">Tidak ada data blok untuk asset ini.</td></tr>';
            } else {
                data.forEach(blok => {
                    const row = document.createElement('tr');
                    const detailButton = `<button class="custom-button detail-button" data-id="${blok.id_blok}">Lihat Detail</button>`;
                    row.innerHTML = `
                        <td>${blok.id_blok}</td>
                        <td>${blok.nama_blok}</td>
                        <td>${blok.deskripsi}</td>
                        <td>${detailButton}</td>
                    `;
                    blokTableBody.appendChild(row);
                });
            }

            document.getElementById('blok-details').style.display = 'block';
        })
        .catch(error => {
            console.error('Error fetching blok details:', error);
        });
    }

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('detail-button')) {
            const blokId = event.target.getAttribute('data-id');
            showBlokDetail(blokId);
        }
        menuToggle.addEventListener('click', function() {
        sidebar.classList.add('show');
    });

    closeBtn.addEventListener('click', function() {
        sidebar.classList.remove('show');
    });
    });

    function showBlokDetail(blokId) {
        fetch('get_single_blok_details.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id_blok: blokId })
        })
        .then(response => response.json())
        .then(blok => {
            document.getElementById('detail-id-blok').innerText = blok.id_blok;
            document.getElementById('detail-asset-id').innerText = blok.asset_id;
            document.getElementById('detail-nama-blok').innerText = blok.nama_blok;
            document.getElementById('detail-alias').innerText = blok.alias;
            document.getElementById('detail-area').innerText = blok.area;
            document.getElementById('detail-dimension').innerText = blok.dimension;
            document.getElementById('detail-deskripsi').innerText = blok.deskripsi;
            document.getElementById('detail-best-use').innerText = blok.best_use;

            const img = document.createElement('img');
            img.src = 'uploads/' + blok.foto;
            img.alt = blok.nama_blok;
            img.style.maxWidth = '300px';
            img.style.width = '100%';
            img.style.height = 'auto';
            img.style.borderRadius = '10px';
            img.style.display = 'block';

            const imgContainer = document.getElementById('detail-foto');
            imgContainer.innerHTML = '';
            imgContainer.style.textAlign = 'center';
            imgContainer.appendChild(img);

            document.getElementById('blok-detail-container').style.display = 'block';
            document.getElementById('blok-details').style.display = 'none';
        })
        .catch(error => {
            console.error('Error fetching single blok detail:', error);
        });
    }

    document.getElementById('back-button').addEventListener('click', function() {
        document.getElementById('asset-details').style.display = 'none';
        document.getElementById('blok-detail-container').style.display = 'none';
        document.getElementById('blok-details').style.display = 'none';
        document.querySelector('.map-container').style.height = '100vh';
        markersLayer.clearLayers();
        markers.forEach(marker => {
            markersLayer.addLayer(marker);
        });
        map.setView([-7.7853587, 110.3660946], 12);
    });

    document.getElementById('back-button1').addEventListener('click', function() {
        document.getElementById('asset-details').style.display = 'none';
        document.getElementById('blok-detail-container').style.display = 'none';
        document.getElementById('blok-details').style.display = 'none';
        document.querySelector('.map-container').style.height = '100vh';
        markersLayer.clearLayers();
        markers.forEach(marker => {
            markersLayer.addLayer(marker);
        });
        map.setView([-7.7853587, 110.3660946], 12);
    });

    document.getElementById('add-blok-button').addEventListener('click', function() {
        const assetId = document.getElementById('asset-id').textContent;
        this.setAttribute('data-asset-id', assetId);
        window.location.href = `tambah_blok.php?asset_id=${assetId}`;
    });

    document.getElementById('back-to-map-button').addEventListener('click', function() {
        document.getElementById('blok-details').style.display = 'none';
    });

    document.getElementById('back-to-blok-list-button').addEventListener('click', function() {
        document.getElementById('blok-detail-container').style.display = 'none';
        document.getElementById('blok-details').style.display = 'block';
    });

    document.getElementById('google-maps-button').addEventListener('click', function() {
        if (activeMarker) {
            const { latitude, longitude } = activeMarker.assetData;
            window.open(`https://www.google.com/maps/search/?api=1&query=${latitude},${longitude}`, '_blank');
        }
    });

    document.getElementById('search-input').addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const filteredMarkers = markers.filter(marker => {
            const asset = marker.assetData;
            return asset.alamat.toLowerCase().includes(query) ||
                   asset.klasifikasi.toLowerCase().includes(query) ||
                   asset.jenis.toLowerCase().includes(query) ||
                   asset.status.toLowerCase().includes(query) ||
                   asset.deskripsi.toLowerCase().includes(query);
        });

        markersLayer.clearLayers();
        filteredMarkers.forEach(marker => {
            markersLayer.addLayer(marker);
        });
    });

    document.getElementById('edit-button').onclick = function() {
        const assetId = document.getElementById('asset-id').textContent;
        window.location.href = `edit_asset.php?id=${assetId}`;
    };

    document.getElementById('delete-button').onclick = function() {
        const assetId = document.getElementById('asset-id').textContent;
        console.log('Hapus aset menggunakan id:', assetId);

        if (confirm('Apakah kamu yakin ingin menghapus asset ini?')) {
            fetch('delete_asset.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: assetId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Sukses menghapus asset');
                    location.reload(); // Reload to refresh the map
                } else {
                    alert(`Error Menghapus asset: ${data.message || 'Unknown error'}`);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error Menghapus asset. Silahkan coba lagi nanti.');
            });
        }
    };
});


    </script>
    
</body>
</html>
