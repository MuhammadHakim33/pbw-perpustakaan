<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">PERPUSKIM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown"></li>
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Menu
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="/book/history">Riwayat Peminjaman</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-center" href="auth/logout">Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Detail Buku -->
    <section id="detail-buku" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4" id="judulBuku">Judul Buku</h2>
            <div class="row">
                <div class="col-md-6">
                    <img src="../assets/image/cnth.jpg" class="img-fluid" alt="Gambar Buku">
                </div>
                <div class="col-md-6">
                    <h4>ISBN: <?= $id; ?></h4>
                    <h4>Penulis: </h4>
                    <h4>Tahun Terbit: </span></h4>
                    <hr>
                    <h5>Form Peminjaman Buku</h5>
                    <form>
                        <div class="mb-3">
                            <label for="namaPeminjam" class="form-label">Nama Peminjam</label>
                            <input type="text" class="form-control" id="namaPeminjam" required>
                        </div>
                        <div class="mb-3">
                            <label for="namaPeminjam" class="form-label">ID</label>
                            <input type="text" class="form-control" id="namaPeminjam" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalPinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control" id="tanggalPinjam" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalKembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control" id="tanggalKembali" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Pinjam Buku</button>
                    </form>
                </div>
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
