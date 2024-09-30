<?php
class Peminjaman {
    private $conn; // Koneksi database
    
    // Constructor untuk inisialisasi koneksi database
    public function __construct($db_conn) {
        $this->conn = $db_conn;
    }

    // Tambah peminjaman
    public function tambahPeminjaman($id_pengguna, $id_buku, $tanggal_peminjaman, $tanggal_jatuh_tempo) {
        $sql = "INSERT INTO peminjaman (id_pengguna, id_buku, tanggal_peminjaman, tanggal_jatuh_tempo, status) 
                VALUES ($id_pengguna, $id_buku, '$tanggal_peminjaman', '$tanggal_jatuh_tempo', 'dipinjam')";

        if ($this->conn->query($sql) === TRUE) {
            echo "Peminjaman berhasil ditambahkan.";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    // Edit status peminjaman
    public function editPeminjaman($id_peminjaman, $status) {
        $sql = "UPDATE peminjaman SET status='$status' WHERE id_peminjaman=$id_peminjaman";

        if ($this->conn->query($sql) === TRUE) {
            echo "Status peminjaman berhasil diperbarui.";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    // getAll peminjaman
    public function getAllPeminjaman() {
        $sql = "SELECT peminjaman.*, pengguna.nama, buku.judul 
                FROM peminjaman 
                JOIN pengguna ON peminjaman.id_pengguna = pengguna.id_pengguna 
                JOIN buku ON peminjaman.id_buku = buku.id_buku";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "ID Peminjaman: " . $row["id_peminjaman"] . " - Nama Pengguna: " . $row["nama"] . 
                     " - Judul Buku: " . $row["judul"] . " - Status: " . $row["status"] . "<br>";
            }
        } else {
            echo "Tidak ada data peminjaman.";
        }
    }

    // Mendapatkan semua peminjaman yang terlambat
    public function getAllPeminjamanTerlambat() {
        $sql = "SELECT peminjaman.*, pengguna.nama, buku.judul 
                FROM peminjaman 
                JOIN pengguna ON peminjaman.id_pengguna = pengguna.id_pengguna 
                JOIN buku ON peminjaman.id_buku = buku.id_buku 
                WHERE peminjaman.status = 'terlambat'";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "ID Peminjaman: " . $row["id_peminjaman"] . " - Nama Pengguna: " . $row["nama"] . 
                     " - Judul Buku: " . $row["judul"] . " - Status: " . $row["status"] . " - Tanggal Jatuh Tempo: " . $row["tanggal_jatuh_tempo"] . "<br>";
            }
        } else {
            echo "Tidak ada peminjaman yang terlambat.";
        }
    }
}

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_perpusteknik";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$peminjaman = new Peminjaman($conn);

$peminjaman->tambahPeminjaman(1, 2, '2024-09-01', '2024-09-10');
$peminjaman->editPeminjaman(1, 'dikembalikan');
$peminjaman->getAllPeminjaman();
$peminjaman->getAllPeminjamanTerlambat();

// Menutup koneksi
$conn->close();
?>
