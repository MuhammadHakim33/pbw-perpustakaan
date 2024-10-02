<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Perpustakaan - Daftar Buku dan Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f1f1;
        }
        .table-container {
            margin-top: 50px;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="auth/logout">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container mt-5 pt-4">
        <!-- Daftar Buku -->
        <div class="table-container">
            <h3>Daftar Buku</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Jumlah Salinan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Belajar Pemrograman</td>
                        <td>John Doe</td>
                        <td>Penerbit ABC</td>
                        <td>2022</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Dasar-Dasar Web Development</td>
                        <td>Jane Smith</td>
                        <td>Penerbit XYZ</td>
                        <td>2021</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>Machine Learning untuk Pemula</td>
                        <td>Ali Ahmad</td>
                        <td>Penerbit MNO</td>
                        <td>2020</td>
                        <td>2</td>
                    </tr>
                    <!-- Tambahkan lebih banyak buku sesuai kebutuhan -->
                </tbody>
            </table>
        </div>

        <!-- Daftar Anggota -->
        <div class="table-container mt-5">
            <h3>Daftar Anggota</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Anggota</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Tanggal Bergabung</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ahmad Suryadi</td>
                        <td>ahmad@example.com</td>
                        <td>ahmadsurya</td>
                        <td>2023-01-15</td>
                    </tr>
                    <tr>
                        <td>Rina Sari</td>
                        <td>rina@example.com</td>
                        <td>rinasari</td>
                        <td>2022-12-05</td>
                    </tr>
                    <tr>
                        <td>Budi Santoso</td>
                        <td>budi@example.com</td>
                        <td>budisantoso</td>
                        <td>2023-03-10</td>
                    </tr>
                    <!-- Tambahkan lebih banyak anggota sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
