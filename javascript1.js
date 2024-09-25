document.addEventListener("DOMContentLoaded", function() {
    const map = L.map('map').setView([-7.797068, 110.370529], 13); // Set view to Yogyakarta
    let markersLayer = L.layerGroup(); // Layer group for all markers

    // Menambah OpenStreetMap layer ke map
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Sinkronkan data dan tambah markers di map
    fetch('get_assets.php')
        .then(response => response.json())
        .then(data => {
            data.forEach(asset => {
                const marker = L.marker([asset.latitude, asset.longitude]).addTo(markersLayer);
                marker.assetData = asset; 
                marker.on('click', () => {
                    // Menyembunyikan semua markers kecuali yg diklik
                    markersLayer.eachLayer(layer => {
                        if (layer !== marker) {
                            map.removeLayer(layer);
                        }
                    });

                    // Menampilkan asset detail
                    showAssetDetails(marker.assetData);

                    document.querySelector('.map-container').style.width = '50%';
                    document.querySelector('.details-container').style.display = 'block';
                });
            });

            markersLayer.addTo(map); // Menambah semua marker
        });

    // Fungsi untuk menampilkan semua detail asset pada container
    function showAssetDetails(asset) {
        document.getElementById('asset-id').textContent = asset.id;
        document.getElementById('asset-jenis').textContent = asset.jenis;
        document.getElementById('asset-luas').textContent = asset.luas;
        document.getElementById('asset-latitude').textContent = asset.latitude;
        document.getElementById('asset-longitude').textContent = asset.longitude;
        document.getElementById('asset-alamat').textContent = asset.alamat;
        document.getElementById('asset-klasifikasi').textContent = asset.klasifikasi;
        document.getElementById('asset-deskripsi').textContent = asset.deskripsi;
        document.getElementById('asset-status').textContent = asset.status;
        
        // Menambahkan gambar
        const fotoElement = document.getElementById('asset-foto');
        fotoElement.innerHTML = ''; // Mengosongkan elemen sebelum menambahkan gambar baru
        const img = document.createElement('img');
        img.src = 'uploads/' + asset.foto; // Path ke folder uploads
        img.style.maxWidth = '100%';
        fotoElement.appendChild(img);

        // Menampilkan harga dalam format ribuan dengan titik
        document.getElementById('asset-harga').textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(asset.harga);

        // Menambah event listener "Lihat di Google Maps"
        const googleMapsButton = document.getElementById('google-maps-button');
        googleMapsButton.onclick = () => {
            const latitude = asset.latitude;
            const longitude = asset.longitude;
            const url = `https://www.google.com/maps?q=${latitude},${longitude}`;
            window.open(url, '_blank'); // Buka google maps
        };
    }

    // Event listener untuk tombol back
    document.getElementById('back-button').addEventListener('click', () => {
        markersLayer.eachLayer(layer => {
            map.addLayer(layer); // Mengembalikan semua markers
        });

        document.querySelector('.map-container').style.width = '100%';
        document.querySelector('.details-container').style.display = 'none';
    });

    // Menu
    var tombolMenu = $(".tombol-menu");
    var menu = $("nav .menu ul");

    function klikMenu() {
        tombolMenu.click(function () {
            menu.toggle();
        });
        menu.click(function () {
            menu.toggle();
        });
    }

    $(document).ready(function () {
        var width = $(window).width();
        if (width < 990) {
            klikMenu();
        }
    });

    // Cek lebar
    $(window).resize(function () {
        var width = $(window).width();
        if (width > 989) {
            menu.css("display", "block");
        } else {
            menu.css("display", "none");
        }
        klikMenu();
    });

    // Efek scroll 
    $(document).ready(function () {
        var scroll_pos = 0;
        $(document).scroll(function () {
            scroll_pos = $(this).scrollTop();
            console.log('Scroll position:', scroll_pos); // Tambahkan ini untuk melacak posisi scroll

            if (scroll_pos > 0) {
                $("nav").addClass("biru");
                $("nav img.hitam").show();
                $("nav img.biru").hide();
            } else {
                $("nav").removeClass("biru");
                $("nav img.hitam").hide();
                $("nav img.biru").show();
            }
        });
    });
});
