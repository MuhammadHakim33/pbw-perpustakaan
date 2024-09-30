<?php

require_once 'Koneksi.php';

class Buku extends Koneksi {
    
    public function __construct() {
        parent::__construct();
    }

    public function ambilBuku() {
        $sql = "SELECT * FROM buku";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function temukanBuku($id) {
        $sql = "SELECT * FROM buku where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tambah buku
    function tambahBuku($judul, $penulis, $penerbit, $tahun_terbit, $isbn, $kategori) {
        $sql = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, isbn, kategori) 
                VALUES (:judul, :penulis, :penerbit, :tahun_terbit, :isbn, :kategori)";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':judul', $judul);
            $stmt->bindParam(':penulis', $penulis);
            $stmt->bindParam(':penerbit', $penerbit);
            $stmt->bindParam(':tahun_terbit', $tahun_terbit);
            $stmt->bindParam(':isbn', $isbn);
            $stmt->bindParam(':kategori', $kategori);
            $stmt->execute();
            return true;
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Edit buku
    function editBuku($id, $judul, $penulis, $penerbit, $tahun_terbit, $isbn, $kategori) {
        $sql = "UPDATE buku SET judul=:judul, penulis=:penulis, penerbit=:penerbit, tahun_terbit=:tahun_terbit, isbn=:isbn, kategori=:kategori 
                WHERE id=:id";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':judul', $judul);
            $stmt->bindParam(':penulis', $penulis);
            $stmt->bindParam(':penerbit', $penerbit);
            $stmt->bindParam(':tahun_terbit', $tahun_terbit);
            $stmt->bindParam(':isbn', $isbn);
            $stmt->bindParam(':kategori', $kategori);
            $stmt->execute();
            return true;
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Mencari buku
    function cariBuku($keyword) {
        $sql = "SELECT * FROM buku WHERE judul LIKE :keyword OR penulis LIKE :keyword";
        $keyword = "%$keyword%"; // Menambahkan wildcard untuk pencarian

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':keyword', $keyword);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Hapus buku
    function hapusBuku($id) {
        $sql = "DELETE FROM buku WHERE id=:id";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}