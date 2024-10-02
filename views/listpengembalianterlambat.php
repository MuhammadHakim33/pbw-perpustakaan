<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Buku Admin</title>
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
                        <a class="nav-link active" href="/admin">Dashboard</a>
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
                            <a class="nav-link" href="/admin">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin#manajemenBuku">
                                <i class="fas fa-book"></i> Manajemen Buku
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin#manajemenUser">
                                <i class="fas fa-users"></i> Manajemen User
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin#pelaporan">
                                <i class="fas fa-file-alt"></i> Pelaporan
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Content Area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">List Pengembalian Terlambat</h1>
                </div>

                <!-- List Buku Section -->
                <section id="listBuku" class="mb-5">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h3>Daftar Pengembalian</h3>
                        <!-- Search Bar -->
                        <input type="text" class="form-control w-25" id="searchBar" placeholder="Search...">
                    </div>
                    <table class="table table-striped" id="bookTable">
                        <thead>
                            <tr>
                                <th>Nama Pengguna</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Jatuh Tempo</th>
                                <th>Tanggal Pengembalian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Placeholder -->
                             <?php
                                foreach ($terlambat as $item): 
                             ?>
                            <tr>
                                <td> <?= $item['nama']; ?> </td>
                                <td> <?= $item['judul']; ?> </td>
                                <td> <?= $item['tanggal_peminjaman']; ?> </td>
                                <td> <?= $item['tanggal_jatuh_tempo'];?> </td>
                                <td> <?= $item['tanggal_dikembalikan'];?> </td>
                            </tr>
                            <?php
                                endforeach;
                            ?>
                            <!-- Tambahkan data buku di sini -->
                        </tbody>
                    </table>
                </section>
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-3">
        <p>&copy; 2024 Perpustakaan Admin - All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script untuk Search Bar -->
    <script>
        // Ambil elemen search bar dan tabel
        const searchBar = document.getElementById('searchBar');
        const bookTable = document.getElementById('bookTable').getElementsByTagName('tbody')[0];

        // Fungsi untuk mencari judul buku
        searchBar.addEventListener('keyup', function() {
            const filter = searchBar.value.toLowerCase();
            const rows = bookTable.getElementsByTagName('tr');

            // Loop melalui semua baris tabel dan sembunyikan yang tidak cocok
            for (let i = 0; i < rows.length; i++) {
                const titleCell = rows[i].getElementsByTagName('td')[1];
                if (titleCell) {
                    const titleText = titleCell.textContent || titleCell.innerText;
                    if (titleText.toLowerCase().indexOf(filter) > -1) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }
        });
    </script>

</body>
</html>
