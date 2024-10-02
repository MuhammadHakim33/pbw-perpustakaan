<?php
class Peminjaman extends Koneksi {
    
    public function __construct() {
        parent::__construct();
    }

    // Tambah peminjaman
    public function tambahPeminjaman($id_pengguna, $id_buku, $tanggal_peminjaman, $tanggal_jatuh_tempo) {
        try {
            $sql = "INSERT INTO peminjaman (id_pengguna, id_buku, tanggal_peminjaman, tanggal_jatuh_tempo, status) 
                    VALUES (:id_pengguna, :id_buku, :tanggal_peminjaman, :tanggal_jatuh_tempo, 'dipinjam')";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_pengguna', $id_pengguna);
            $stmt->bindParam(':id_buku', $id_buku);
            $stmt->bindParam(':tanggal_peminjaman', $tanggal_peminjaman);
            $stmt->bindParam(':tanggal_jatuh_tempo', $tanggal_jatuh_tempo);
            $stmt->execute();
            return true;
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // getAll peminjaman
    public function getAllPeminjaman() {
        try {
            $sql = "SELECT peminjaman.*, pengguna.nama, buku.judul 
                    FROM peminjaman 
                    JOIN pengguna ON peminjaman.id_pengguna = pengguna.id 
                    JOIN buku ON peminjaman.id_buku = buku.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // getAll peminjaman spesifik user
    public function getAllPeminjamanUser($id) {
        try {
            $sql = "SELECT peminjaman.*, pengguna.nama, buku.judul 
                    FROM peminjaman 
                    JOIN pengguna ON peminjaman.id_pengguna = pengguna.id 
                    JOIN buku ON peminjaman.id_buku = buku.id
                    WHERE id_pengguna = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // getAll peminjaman terlambat
    public function getAllPeminjamanTerlambat() {
        try {
            $sql = "SELECT peminjaman.*, pengguna.nama, buku.judul 
                    FROM peminjaman 
                    JOIN pengguna ON peminjaman.id_pengguna = pengguna.id 
                    JOIN buku ON peminjaman.id_buku = buku.id 
                    WHERE peminjaman.tanggal_jatuh_tempo != peminjaman.tanggal_dikembalikan";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // get spesifik peminjaman
    public function getPeminjamanUser($id) {
        try {
            $sql = "SELECT peminjaman.*, pengguna.nama, buku.judul 
                    FROM peminjaman 
                    JOIN pengguna ON peminjaman.id_pengguna = pengguna.id 
                    JOIN buku ON peminjaman.id_buku = buku.id 
                    WHERE peminjaman.id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // pengembalian buku
    public function pengembalianBuku($id) {
        try {
            $sql = "UPDATE peminjaman 
                    SET status='dikembalikan', tanggal_dikembalikan=:tanggal_dikembalikan
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $current_date = date('Y-m-d');
            $stmt->bindParam(':tanggal_dikembalikan', $current_date);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // get jumlah peminjaman dari setiap buku
    public function countPeminjaman() {
        try {
            $sql = "SELECT buku.id, buku.judul, COUNT(peminjaman.id_buku) AS total_pinjaman
                    FROM peminjaman
                    JOIN buku ON peminjaman.id_buku = buku.id
                    GROUP BY peminjaman.id_buku;";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
