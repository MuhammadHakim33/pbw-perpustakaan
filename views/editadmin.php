<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f1f1;
        }
        .form-container {
            margin-top: 50px;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-header h2 {
            color: #343a40;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .form-label {
            font-weight: bold;
            color: #495057;
        }
    </style>
</head>
<body>

    <div class="container form-container">
        <div class="form-header">
            <h2><i class="fas fa-book"></i> Tambah Buku</h2>
        </div>
        <form action="/book/store" method="POST">

            <div class="mb-3">
                <label for="title" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="title" name="judul" value="<?= $buku[0]['judul'] ?>" placeholder="Masukkan judul buku" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="author" name="penulis" value="<?= $buku[0]['penulis'] ?>" placeholder="Masukkan nama penulis" required>
            </div>

            <div class="mb-3">
                <label for="publisher" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="publisher" name="penerbit" value="<?= $buku[0]['penerbit'] ?>" placeholder="Masukkan nama penerbit" required>
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="year" name="tahun_terbit" value="<?= $buku[0]['tahun_terbit'] ?>" placeholder="Masukkan tahun terbit" required>
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="genre" name="kategori" value="<?= $buku[0]['kategori'] ?>" placeholder="Masukkan genre buku" required>
            </div>

            <div class="mb-3">
                <label for="copies" class="form-label">ISBN</label>
                <input type="number" class="form-control" id="code" name="isbn" value="<?= $buku[0]['isbn'] ?>" placeholder="Masukkan ISBN" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-custom">Edit Buku</button>
                <a href="/admin/index" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
