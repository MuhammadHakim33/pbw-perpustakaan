<?php
class Buku extends Koneksi {
    
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
            echo "Peminjaman berhasil ditambahkan.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // getAll peminjaman
    public function getAllPeminjaman() {
        try {
            $sql = "SELECT peminjaman.*, pengguna.nama, buku.judul 
                    FROM peminjaman 
                    JOIN pengguna ON peminjaman.id_pengguna = pengguna.id_pengguna 
                    JOIN buku ON peminjaman.id_buku = buku.id_buku";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (count($result) > 0) {
                foreach ($result as $row) {
                    echo "ID Peminjaman: " . $row["id_peminjaman"] . " - Nama Pengguna: " . $row["nama"] . 
                         " - Judul Buku: " . $row["judul"] . " - Status: " . $row["status"] . "<br>";
                }
            } else {
                echo "Tidak ada data peminjaman.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // getAll peminjaman terlambat
    public function getAllPeminjamanTerlambat() {
        try {
            $sql = "SELECT peminjaman.*, pengguna.nama, buku.judul 
                    FROM peminjaman 
                    JOIN pengguna ON peminjaman.id_pengguna = pengguna.id_pengguna 
                    JOIN buku ON peminjaman.id_buku = buku.id_buku 
                    WHERE peminjaman.status = 'terlambat'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (count($result) > 0) {
                foreach ($result as $row) {
                    echo "ID Peminjaman: " . $row["id_peminjaman"] . " - Nama Pengguna: " . $row["nama"] . 
                         " - Judul Buku: " . $row["judul"] . " - Status: " . $row["status"] . 
                         " - Tanggal Jatuh Tempo: " . $row["tanggal_jatuh_tempo"] . "<br>";
                }
            } else {
                echo "Tidak ada pengembalian peminjaman yang terlambat.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // getAll pengembalian buku
    public function pengembalianBuku($id_peminjaman) {
        try {
            $sql = "UPDATE peminjaman 
                    SET status = 'dikembalikan' 
                    WHERE id_peminjaman = :id_peminjaman";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_peminjaman', $id_peminjaman);
            $stmt->execute();
            echo "Buku berhasil dikembalikan.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
