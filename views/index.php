<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">PERPUSCOY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown"></li>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/book/history">Riwayat Peminjaman</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-center" href="/auth/logout">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- Dashboard Buku -->
<section id="koleksi" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Daftar Koleksi Buku</h2>
        <table class="table table-striped table-hover" style="border: 1px solid black; border-spacing: 0;">
            <thead>
                <tr>
                    <th scope="col" class="text-start" style="width: 28%; border-right: 2px solid #000; padding-right: 6px;">Judul Buku</th>
                    <th scope="col" class="text-start" style="width: 20%; border-right: 2px solid #000; padding-right: 15px;">Penulis</th>
                    <th scope="col" class="text-start" style="width: 20%; border-right: 2px solid #000; padding-right: 15px;">Penerbit</th>
                    <th scope="col" class="text-start" style="width: 10%; border-right: 2px solid #000; padding-right: 15px;">Tahun terbit</th>
                    <th scope="col" class="text-start" style="width: 10%; padding-left: 10px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Buku 1 -->
                 <?php foreach($buku as $item): ?>
                <tr>
                    <td class="text-start" style="border-right: 2px solid #000; padding-right: 6px;"> <?= $item["judul"]?> </td>
                    <td class="text-start" style="border-right: 2px solid #000; padding-right: 15px;"> <?= $item["penulis"]?> </td>
                    <td class="text-start" style="border-right: 2px solid #000; padding-right: 15px;"><?= $item["penerbit"]?></td>
                    <td class="text-start" style="border-right: 2px solid #000; padding-right: 15px;"><?= $item["tahun_terbit"]?></td>
                    <td class="text-center justify-content-center pt-3">
                        <button onclick="window.location.href='/book/detail/<?= $item['id']?>';" class="btn btn-primary">Lihat Buku</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

    <footer class="bg-dark text-white mt-5">
        <div class="container py-4">
            <div class="row">
                
                <div class="col-md-4">
                    <h5 class="text-uppercase">Tentang Perpuscoy</h5>
                    <p>Perpuscoy adalah perpustakaan digital modern yang menyediakan berbagai buku dari berbagai genre. Kami berkomitmen untuk mendukung literasi di era digital ini.</p>
                </div>
                
                <div class="col-md-4">
                    <h5 class="text-uppercase">Kontak Kami</h5>
                    <ul class="list-unstyled">
                        <li>Email: info@perpuscoy.com</li>
                        <li>Telepon: +62 21 12345678</li>
                        <li>Alamat: Jl. Cerdas No. 7, Jakarta</li>
                    </ul>
                </div>
                
                <div class="col-md-4">
                    <h5 class="text-uppercase">Ikuti Kami</h5>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="text-white">
                                <img src="https://img.icons8.com/ios-glyphs/30/ffffff/facebook-new.png"/>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-white">
                                <img src="https://img.icons8.com/ios-glyphs/30/ffffff/instagram-new.png"/>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-white">
                                <img src="https://img.icons8.com/ios-glyphs/30/ffffff/twitter.png"/>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="bg-white">
            <div class="text-center">
                <p>&copy; 2024 PERPUSCOY. All Rights Reserved.</p>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
