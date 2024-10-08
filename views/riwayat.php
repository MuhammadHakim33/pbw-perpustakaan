<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">PERPUSKIM</a>
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
                            <li><a class="dropdown-item" href="/">Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-center" href="/auth/logout">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Riwayat Peminjaman Buku -->
    <section id="riwayat-peminjaman" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Riwayat Peminjaman Buku</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Judul Buku</th>
                            <th class="text-center">Tanggal Pinjam</th>
                            <th class="text-center">Tanggal Jatuh Tempo</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($peminjaman as $item): ?>
                        <tr>
                            <td><?= $i++;?></td>
                            <td><?= $item["judul"]?></td>
                            <td><?= $item["tanggal_peminjaman"]?></td>
                            <td><?= $item["tanggal_jatuh_tempo"]?></td>
                            <td><span class="badge bg-success"><?= $item["status"]?></span></td>
                            <td><a href="/book/return/<?= $item['id']?>" class="btn btn-danger">Kembalikan Buku</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white mt-5"></footer>
        <div class="container py-4">
            <div class="row">
                
                <div class="col-md-4">
                    <h5 class="text-uppercase">Tentang Perpuskim</h5>
                    <p>Perpuskim adalah perpustakaan digital modern yang menyediakan berbagai buku dari berbagai genre. Kami berkomitmen untuk mendukung literasi di era digital ini.</p>
                </div>
                
                <div class="col-md-4">
                    <h5 class="text-uppercase">Kontak Kami</h5>
                    <ul class="list-unstyled">
                        <li>Email: info@perpuskim.com</li>
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
                <p>&copy; 2024 PERPUSKIM. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
