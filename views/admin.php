<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin.css">

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PERPUSKIM Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/logout">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container-fluid mt-5 pt-4">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#manajemenBuku">
                                <i class="fas fa-book"></i> Manajemen Buku
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#manajemenUser">
                                <i class="fas fa-users"></i> Manajemen User
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pelaporan">
                                <i class="fas fa-file-alt"></i> Pelaporan
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Content Area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>

                <!-- Manajemen Buku Section -->
                <section id="manajemenBuku" class="mb-5">
                    <h3>Manajemen Buku</h3>
                    <div class="d-flex flex-wrap">
                        <button class="btn btn-primary m-2"><i class="fas fa-plus"></i> Tambah Buku</button>
                        <button class="btn btn-danger m-2"><i class="fas fa-trash-alt"></i> Hapus Buku</button>
                        <button class="btn btn-secondary m-2"><i class="fas fa-search"></i> Cari Buku</button>
                    </div>
                </section>

                <!-- Manajemen User Section -->
                <section id="manajemenUser" class="mb-5">
                    <h3>Manajemen User</h3>
                    <button class="btn btn-info"><i class="fas fa-user-check"></i> Cek Informasi User</button>
                </section>

                <!-- Pelaporan Section -->
                <section id="pelaporan" class="mb-5">
                    <h3>Pelaporan</h3>
                    <div class="d-flex flex-wrap">
                        <button class="btn btn-success m-2"><i class="fas fa-file-alt"></i> Laporan Peminjaman</button>
                        <button class="btn btn-success m-2"><i class="fas fa-file-alt"></i> Laporan Pengembalian</button>
                        <button class="btn btn-success m-2"><i class="fas fa-file-alt"></i> Log Peminjaman</button>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-3">
        <p>&copy; 2024 Perpustakaan Admin - All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
